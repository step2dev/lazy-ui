<?php

namespace Lazyadm\LazyComponent\Components;

use Illuminate\Contracts\View\View;
use Lazyadm\LazyComponent\LazyComponent;

class Kdb extends LazyComponent
{
    protected array $sizes = [
        self::DEFAULT => '',
        'lg' => 'kbd-lg',
        'md' => 'kbd-md',
        'sm' => 'kbd-sm',
        'xs' => 'kbd-xs',
    ];

    public function render(): \Closure|View
    {
        return function (array $data) {
            return view('lazy::kbd', $this->mergeData($data))->render();
        };
    }
}
