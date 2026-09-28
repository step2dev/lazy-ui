<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\Contracts\View\View;
use Step2dev\LazyUI\LazyComponent;

class Tabs extends LazyComponent
{
    public function __construct(
        public string $type = '',
        public string $size = '',
        public string $placement = '',
        public bool $top = false,
        public bool $bottom = false,
    ) {}

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

            $size = $this->getSizeByAttribute($attributes, $this->size ?: null);
            $type = $this->getKeyByAttribute(
                $attributes,
                $this->allowedTabType(),
                'type',
                $this->type ?: ''
            );

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
                'size',
                'type',
                'placement',
                'top',
                'bottom',
            ]))->render();
        };
    }
}
