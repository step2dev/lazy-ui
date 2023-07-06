<?php

namespace Lazyadm\LazyComponent\Components;

use Closure;
use Illuminate\Contracts\View\View;

class BtnGroup extends Join
{
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): Closure|View
    {
        return function (array $data) {
            return view('lazy::join', $this->mergeData($data))->render();
        };
    }
}
