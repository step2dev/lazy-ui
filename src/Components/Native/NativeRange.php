<?php

namespace Lazyadm\LazyComponent\Components\Native;

use Illuminate\Contracts\View\View;
use Lazyadm\LazyComponent\LazyComponent;

class NativeRange extends LazyComponent
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
            return view('lazy::native.range', $this->mergeData($data))->render();
        };
    }
}
