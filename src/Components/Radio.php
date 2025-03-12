<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\Contracts\View\View;
use Step2dev\LazyUI\LazyComponent;

class Radio extends LazyComponent
{
    public function render(): \Closure|View
    {
        return function (array $data) {
            $attributes = $this->getAttributesFromData($data);
            $attributes['type'] = 'radio';
            $data['attributes'] = $attributes;

            $color = $this->getColorByAttribute($attributes);
            $size = $this->getSizeByAttribute($attributes);

            return view('lazy::radio', $this->mergeData($data, [
                'radio',
                // colors
                'radio-primary' => $color === 'primary',
                'radio-secondary' => $color === 'secondary',
                'radio-accent' => $color === 'accent',
                'radio-info' => $color === 'info',
                'radio-success' => $color === 'success',
                'radio-warning' => $color === 'warning',
                'radio-error' => $color === 'error',
                // sizes
                'radio-lg' => $size === 'lg',
                'radio-md' => $size === 'md',
                'radio-sm' => $size === 'sm',
                'radio-xs' => $size === 'xs',
            ], [
                'color',
            ]))->render();
        };
    }
}
