<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\Contracts\View\View;
use Step2dev\LazyUI\LazyComponent;

class Toast extends LazyComponent
{
    public function render(): \Closure|View
    {
        return function (array $data) {
            return view('lazy::toast', $this->mergeData($data))->render();
        };
    }
}
