<?php

namespace Lazyadm\LazyComponent\Components;

use Illuminate\Contracts\View\View;
use Lazyadm\LazyComponent\LazyComponent;

class Range extends LazyComponent
{
    protected array $colors = [
        'default' => '',
        'primary' => 'range-primary',
        'secondary' => 'range-secondary',
        'accent' => 'range-accent',
        'info' => 'range-info',
        'success' => 'range-success',
        'warning' => 'range-warning',
        'error' => 'range-error',
    ];

    protected array $sizes = [
        'default' => '',
        'lg' => 'range-lg',
        'md' => 'range-md',
        'sm' => 'range-sm',
        'xs' => 'range-xs',
    ];

    public function render(): \Closure|View
    {
        return function (array $data) {
            $attributes = $data['attributes'];
            $attributes['min'] ??= 0;
            $attributes['max'] ??= 100;
            $attributes['value'] ??= $attributes['min'];
            $attributes['step'] ??= null;

            $attributes['steps'] ??= null;

            if ($attributes['steps']) {
                $attributes['step'] = ($attributes['max'] - $attributes['min']) / ($attributes['steps'] - 1);
            }
            $data['attributes'] = $attributes;

            return view('lazy::native.range', $this->mergeData($data))->render();
        };
    }
}
