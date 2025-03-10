<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\Contracts\View\View;
use Step2dev\LazyUI\LazyComponent;

class Checkbox extends LazyComponent
{
    public function __construct(?string $label = '')
    {
        $this->label = $label;
    }

    public function render(): \Closure|View
    {
        return function (array $data) {
            $attributes = $this->getAttributesFromData($data);
            $attributes['type'] = 'checkbox';
            $data['attributes'] = $attributes;

            $color = $this->getColorByAttribute($attributes);
            $size = $this->getSizeByAttribute($attributes);

            return view('lazy::checkbox', $this->mergeData($data, [
                'checkbox',
                // colors
                'checkbox-primary' => $color === 'primary',
                'checkbox-secondary' => $color === 'secondary',
                'checkbox-accent' => $color === 'accent',
                'checkbox-success' => $color === 'success',
                'checkbox-warning' => $color === 'warning',
                'checkbox-info' => $color === 'info',
                'checkbox-error' => $color === 'error',
                // sizes
                'checkbox-lg' => $size === 'lg',
                'checkbox-md' => $size === 'md',
                'checkbox-sm' => $size === 'sm',
                'checkbox-xs' => $size === 'xs',
            ], [
                'color',
                'size',
            ]))->render();
        };
    }
}
