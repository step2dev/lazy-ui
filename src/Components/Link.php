<?php

namespace Lazyadm\LazyComponent\Components;

use Closure;
use Illuminate\View\ComponentAttributeBag;
use Lazyadm\LazyComponent\LazyComponent;

class Link extends LazyComponent
{
    protected array $colors = [
        'default'   => '',
        'neutral'   => 'link-neutral',
        'primary'   => 'link-primary',
        'secondary' => 'link-secondary',
        'accent'    => 'link-accent',
        'success'   => 'link-success',
        'info'      => 'link-info',
        'warning'   => 'link-warning',
        'error'     => 'link-error',
        'hover'     => 'link-hover',
    ];

    public function render(): Closure
    {
        return function (array $data) {
            return view('lazy::link', $this->mergeData($data))->render();
        };
    }
}
