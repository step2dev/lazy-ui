<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\Contracts\View\View;
use Step2dev\LazyUI\LazyComponent;

class Tabs extends LazyComponent
{
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

    public function allowedTabType(): array
    {
        return ['boxed', 'lifted', 'bordered', 'box', 'lift', 'border'];
    }

    public function render(): \Closure|View
    {
        return function (array $data) {
            $attributes = $this->getAttributesFromData($data);
            $attributes['role'] = 'tablist';
            $data['attributes'] = $attributes;
            $data['items'] = $this->items;

            $size = $this->getSizeByAttribute($attributes, $this->size ?: null);
            $type = $this->getKeyByAttribute($attributes, $this->allowedTabType(), 'type', $this->type ?: '');

            $placement = $this->placement;
            if ($this->top || $attributes->has('top')) {
                $placement = 'top';
            } elseif ($this->bottom || $attributes->has('bottom')) {
                $placement = 'bottom';
            }

            return view('lazy::tabs', $this->mergeData($data, [
                'tabs',
                'tabs-box' => in_array($type, ['boxed', 'box'], true),
                'tabs-lift' => in_array($type, ['lifted', 'lift'], true),
                'tabs-border' => in_array($type, ['bordered', 'border'], true),
                'tabs-top' => $placement === 'top',
                'tabs-bottom' => $placement === 'bottom',
                'tabs-xl' => $size === 'xl',
                'tabs-lg' => $size === 'lg',
                'tabs-md' => $size === 'md',
                'tabs-sm' => $size === 'sm',
                'tabs-xs' => $size === 'xs',
            ], [
                'size', 'type', 'placement', 'top', 'bottom',
            ]))->render();
        };
    }
}
