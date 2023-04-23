<?php

namespace Lazyadm\LazyComponent\Components;

use Illuminate\Contracts\View\View;

class Toast extends Checkbox
{
    public function render(): \Closure|View
    {
        return function (array $data) {
            return view('lazy::toast', $this->mergeData($data))->render();
        };
    }
}
