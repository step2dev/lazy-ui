<?php

namespace Step2dev\LazyUI\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Step2dev\LazyUI\LazyComponent;

class Tab extends LazyComponent
{
    public function allowedTabType(): array
    {
        return [
            'boxed',
            'lifted',
            'bordered',
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure
    {
        return function (array $data) {
            $attributes = $this->getAttributesFromData($data);

            $data['label'] = $data['label'] ?: $attributes['title'] ?? '';

            $type = $this->getKeyByAttribute($attributes, $this->allowedTabType(), 'type');
            $size = $this->getSizeByAttribute($attributes);

            return view('lazy::tab', $this->mergeData($data, [
                'tab',
                'tab-active' => $attributes['active'] ?? false,
                'tab-bordered' => $type === 'bordered',
                'tab-lifted' => $type === 'lifted',

                'tab-sm' => $size === 'sm',
                'tab-md' => $size === 'md',
                'tab-lg' => $size === 'lg',
                'tab-xl' => $size === 'xl',
            ]))->render();
        };
    }
}
