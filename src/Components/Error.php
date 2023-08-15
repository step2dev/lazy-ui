<?php

namespace Lazyadm\LazyComponent\Components;

use Closure;
use Lazyadm\LazyComponent\LazyComponent;

class Error extends LazyComponent
{
    public function render(): Closure
    {
        return function (array $data) {
            return view('lazy::error', $this->mergeData($data))->render();
        };
    }
}
