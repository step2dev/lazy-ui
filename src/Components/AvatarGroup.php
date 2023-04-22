<?php

namespace Lazyadm\LazyComponent\Components;

use Illuminate\Contracts\View\View;
use Lazyadm\LazyComponent\LazyComponent;

class AvatarGroup extends LazyComponent
{
    public function render(): \Closure|View
    {
        return view('lazy::avatar');
    }
}
