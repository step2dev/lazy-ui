<?php

namespace Lazyadm\LazyComponent\Components;

use Illuminate\Contracts\View\View;
use Lazyadm\LazyComponent\LazyComponent;

class Checkbox extends LazyComponent
{
    public function __construct(?string $label = '')
    {
        $this->label = $label;
    }

    protected array $colors = [
        'default'   => '',
        'primary'   => 'checkbox-primary',
        'secondary' => 'checkbox-secondary',
        'accent'    => 'checkbox-accent',
    ];

    protected array $sizes = [
        'default' => '',
        'lg'      => 'checkbox-lg',
        'md'      => 'checkbox-md',
        'sm'      => 'checkbox-sm',
        'xs'      => 'checkbox-xs',
    ];

    public function render(): \Closure|View
    {
        return function (array $data) {
            return view('lazy::checkbox', $this->mergeData($data))->render();
        };
    }
}
