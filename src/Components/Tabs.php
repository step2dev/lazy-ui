<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\View\ComponentAttributeBag;

class Tabs extends DaisyComponent
{
    protected const VIEW = 'lazy::tabs';

    public array $items = [];

    public function __construct(
        public string $type = '',
        public string $size = '',
        public string $placement = '',
        public bool $top = false,
        public bool $bottom = false,
        array $items = [],
        public int|string|null $active = null,
    ) {
        foreach (array_values($items) as $index => $item) {
            $normalized = is_array($item) ? $item : ['label' => $item];
            $key = $normalized['key'] ?? $normalized['value'] ?? $index;

            $this->items[] = [
                'label' => (string) ($normalized['label'] ?? $normalized['title'] ?? $key),
                'href' => $normalized['href'] ?? null,
                'content' => $normalized['content'] ?? null,
                'disabled' => (bool) ($normalized['disabled'] ?? false),
                'active' => array_key_exists('active', $normalized)
                    ? (bool) $normalized['active']
                    : ((string) $this->active === (string) $key),
            ];
        }
    }

    protected function prepareAttributes(ComponentAttributeBag $attributes): ComponentAttributeBag
    {
        $attributes['role'] = 'tablist';

        return $attributes;
    }

    protected function componentData(array $data, ComponentAttributeBag $attributes): array
    {
        $unstyled = $this->truthy($attributes->get('unstyled'));
        $items = $this->items;

        foreach ($items as &$item) {
            $item['classes'] = $unstyled
                ? ''
                : $this->classes([
                    'tab',
                    'tab-active' => $item['active'],
                    'tab-disabled' => $item['disabled'],
                ]);
        }
        unset($item);

        return ['items' => $items];
    }

    protected function viewClasses(): array
    {
        return ['content' => 'tab-content'];
    }

    protected function componentClasses(array $data, ComponentAttributeBag $attributes): array
    {
        $type = $this->type;

        foreach (['boxed', 'box', 'lifted', 'lift', 'bordered', 'border'] as $candidate) {
            if ($attributes->has($candidate) && $this->truthy($attributes->get($candidate))) {
                $type = $candidate;
                break;
            }
        }

        $placement = $this->placement;
        if ($this->top || $attributes->has('top')) {
            $placement = 'top';
        } elseif ($this->bottom || $attributes->has('bottom')) {
            $placement = 'bottom';
        }

        return [
            'tabs',
            'tabs-box' => in_array($type, ['boxed', 'box'], true),
            'tabs-lift' => in_array($type, ['lifted', 'lift'], true),
            'tabs-border' => in_array($type, ['bordered', 'border'], true),
            'tabs-top' => $placement === 'top',
            'tabs-bottom' => $placement === 'bottom',
            'tabs-xl' => $this->size === 'xl',
            'tabs-lg' => $this->size === 'lg',
            'tabs-md' => $this->size === 'md',
            'tabs-sm' => $this->size === 'sm',
            'tabs-xs' => $this->size === 'xs',
        ];
    }

    protected function consumedAttributes(): array
    {
        return [
            'boxed', 'box', 'lifted', 'lift', 'bordered', 'border',
            'top', 'bottom',
        ];
    }
}
