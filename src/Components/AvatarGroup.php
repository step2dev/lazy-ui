<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\Contracts\View\View;
use Step2dev\LazyUI\LazyComponent;

class AvatarGroup extends LazyComponent
{
    public function render(): \Closure|View
    {
        return view('lazy::avatar-group');
    }
}
