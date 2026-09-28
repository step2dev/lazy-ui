<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\View\ComponentAttributeBag;

class Accordion extends DaisyComponent
{
    protected const VIEW = 'lazy::accordion';

    public array $items = [];

    public bool $collectionMode = false;

    public function __construct(
        public string $title = '',
        public string $label = '',
        public bool $active = false,
        public string $name = 'accordion',
        public bool $toggle = false,
        public string $type = 'plus',
        array $items = [],
        public bool $multiple = false,
    ) {
        $this->collectionMode = $items !== [];
        $this->toggle = $this->toggle || $this->multiple;

        foreach (array_values($items) as $index => $item) {
            $normalized = is_array($item) ? $item : ['title' => $item];

            $this->items[] = [
                'title' => (string) ($normalized['title'] ?? $normalized['label'] ?? ''),
                'content' => $normalized['content'] ?? '',
                'active' => (bool) ($normalized['active'] ?? false),
                'disabled' => (bool) ($normalized['disabled'] ?? false),
                'name' => (string) ($normalized['name'] ?? $this->name),
                'inputType' => ($normalized['toggle'] ?? $this->toggle) ? 'checkbox' : 'radio',
                'classes' => $this->classes([
                    'collapse',
                    'bg-base-200',
                    'mb-2',
                    'collapse-arrow' => ($normalized['type'] ?? $this->type) === 'arrow',
                    'collapse-plus' => ($normalized['type'] ?? $this->type) !== 'arrow',
                ]),
            ];
        }
    }

    protected function componentClasses(array $data, ComponentAttributeBag $attributes): array
    {
        if ($this->collectionMode) {
            return [];
        }

        return [
            'collapse',
            'bg-base-200',
            'mb-2',
            'collapse-arrow' => $this->type === 'arrow',
            'collapse-plus' => $this->type !== 'arrow',
        ];
    }

    protected function componentData(array $data, ComponentAttributeBag $attributes): array
    {
        $items = $this->items;

        if ($this->truthy($attributes->get('unstyled'))) {
            $items = array_map(static fn (array $item): array => [
                ...$item,
                'classes' => '',
            ], $items);
        }

        return [
            'items' => $items,
            'resolvedTitle' => $this->title ?: $this->label,
            'inputType' => $this->toggle ? 'checkbox' : 'radio',
        ];
    }

    protected function viewClasses(): array
    {
        return [
            'title' => 'collapse-title text-xl font-medium',
            'content' => 'collapse-content',
        ];
    }
}
