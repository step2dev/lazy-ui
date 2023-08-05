<?php

namespace Lazyadm\LazyComponent\Components;

use Illuminate\Contracts\View\View;
use Lazyadm\LazyComponent\LazyComponent;

class Countdown extends LazyComponent
{

    public function render(): \Closure|View
    {
        return function (array $data) {
            return view('lazy::countdown', $this->mergeData($data))->render();
        };
    }
}
