<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\View\ComponentAttributeBag;

class Dock extends DaisyComponent
{
    protected const VIEW = 'lazy::dock';

    public array $items = [];

    public function __construct(
        public string $size = '',
        array $items = [],
    ) {
        foreach (array_values($items) as $index => $item) {
            $normalized = is_array($item) ? $item : ['label' => $item];

            $this->items[] = [
                'label' => (string) ($normalized['label'] ?? ''),
                'href' => $normalized['href'] ?? null,
                'content' => $normalized['content'] ?? $normalized['icon'] ?? null,
                'active' => (bool) ($normalized['active'] ?? false),
                'disabled' => (bool) ($normalized['disabled'] ?? false),
                'classes' => $this->classes([
                    'dock-active' => (bool) ($normalized['active'] ?? false),
                ]),
            ];
        }
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

        return ['items' => $items];
    }

    protected function viewClasses(): array
    {
        return ['label' => 'dock-label'];
    }

    protected function componentClasses(array $data, ComponentAttributeBag $attributes): array
    {
        return [
            'dock',
            'dock-xs' => $this->size === 'xs',
            'dock-sm' => $this->size === 'sm',
            'dock-md' => $this->size === 'md',
            'dock-lg' => $this->size === 'lg',
            'dock-xl' => $this->size === 'xl',
        ];
    }
}
