<?php

namespace Step2dev\LazyUI\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Step2dev\LazyUI\LazyComponent;

class Tab extends LazyComponent
{
    public function render(): View|Closure
    {
        return function (array $data) {
            $attributes = $this->getAttributesFromData($data);
            $data['label'] = $data['label'] ?: $attributes['title'] ?? '';

            $size = $this->getSizeByAttribute($attributes);

            return view('lazy::tab', $this->mergeData($data, [
                'tab',
                'tab-active' => $attributes['active'] ?? false,
                'tab-sm' => $size === 'sm',
                'tab-md' => $size === 'md',
                'tab-lg' => $size === 'lg',
                'tab-xl' => $size === 'xl',
            ], [
                'active',
                'size',
            ]))->render();
        };
    }
}
