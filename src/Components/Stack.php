<?php

namespace Lazyadm\LazyComponent\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Lazyadm\LazyComponent\LazyComponent;

class Stack extends LazyComponent
{
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): Closure|View
    {
        return static function (array $data) {
            return view('lazy::stack', $data)->render();
        };
    }
}
