<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\Contracts\View\View;
use Step2dev\LazyUI\LazyComponent;

class Toast extends LazyComponent
{
    public function render(): View
    {
        return view('lazy::toast');
    }
}
