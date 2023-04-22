<?php

namespace Lazyadm\LazyComponent\Components;

use Illuminate\Contracts\View\View;
use Lazyadm\LazyComponent\LazyComponent;

class Stack extends LazyComponent
{

    public function render(): \Closure|View
    {
        return view('lazy::stack');
    }
}
