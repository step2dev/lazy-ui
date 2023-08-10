<?php

namespace Lazyadm\LazyComponent\Components;

use Illuminate\Contracts\View\View;
use Lazyadm\LazyComponent\LazyComponent;

class Toast extends LazyComponent
{
    public function render(): \Closure|View
    {
        return function (array $data) {
            return view('lazy::toast', $this->mergeData($data))->render();
        };
    }
}
