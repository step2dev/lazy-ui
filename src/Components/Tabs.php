<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\Contracts\View\View;
use Step2dev\LazyUI\LazyComponent;

class Tabs extends LazyComponent
{
    public function __construct(public string $type = '', public string $size = '') {}

    public function allowedTabType(): array
    {
        return [
            'boxed',
            'lifted',
            'bordered',
        ];
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

            return view('lazy::tabs', $this->mergeData($data, [
                'tabs',
                'tabs-box' => $type === 'boxed',
                'tabs-lift' => $type === 'lifted',
                'tabs-border' => $type === 'bordered',
                'tabs-xl' => $size === 'xl',
                'tabs-lg' => $size === 'lg',
                'tabs-md' => $size === 'md',
                'tabs-sm' => $size === 'sm',
                'tabs-xs' => $size === 'xs',
            ], [
                'size',
                'type',
            ]))->render();
        };
    }
}
