<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\Contracts\View\View;
use Step2dev\LazyUI\LazyComponent;

class Range extends LazyComponent
{
    public function render(): \Closure|View
    {
        return function (array $data) {
            $attributes = $this->getAttributesFromData($data);
            $attributes['type'] = 'range';
            $attributes['min'] ??= 0;
            $attributes['max'] ??= 100;
            $attributes['value'] ??= $attributes['min'];
            $attributes['step'] ??= null;

            $attributes['steps'] ??= null;

            if ($attributes['steps']) {
                $attributes['step'] = ($attributes['max'] - $attributes['min']) / ($attributes['steps'] - 1);
            }
            $data['attributes'] = $attributes;

            $color = $this->getColorByAttribute($attributes);
            $size = $this->getSizeByAttribute($attributes);

            return view('lazy::range', $this->mergeData($data, [
                'range',
                //colors
                'range-primary' => $color === 'primary',
                'range-secondary' => $color === 'secondary',
                'range-accent' => $color === 'accent',
                'range-info' => $color === 'info',
                'range-success' => $color === 'success',
                'range-warning' => $color === 'warning',
                'range-error' => $color === 'error',
                //sizes
                'range-lg' => $size === 'lg',
                'range-md' => $size === 'md',
                'range-sm' => $size === 'sm',
                'range-xs' => $size === 'xs',
            ]))->render();
        };
    }
}
