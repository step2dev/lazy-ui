<?php

namespace Lazyadm\LazyComponent\Components;

use Illuminate\Contracts\View\View;
use Lazyadm\LazyComponent\LazyComponent;

class Radio extends LazyComponent
{
    protected array $colors = [
        'default' => '',
        'primary' => 'radio-primary',
        'secondary' => 'radio-secondary',
        'accent' => 'radio-accent',
        'info' => 'radio-info',
        'success' => 'radio-success',
        'warning' => 'radio-warning',
        'error' => 'radio-error',
    ];

    protected array $sizes = [
        'default' => '',
        'lg' => 'radio-lg',
        'md' => 'radio-md',
        'sm' => 'radio-sm',
        'xs' => 'radio-xs',
    ];

    public function render(): \Closure|View
    {
        return function (array $data) {
            return view('lazy::radio', $this->mergeData($data))->render();
        };
    }
}
