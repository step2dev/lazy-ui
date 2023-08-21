<?php

namespace Step2dev\LazyUI\Components\Buttons;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BtnBack extends Component
{
    public function render(): View
    {
        return view('lazy::btn.back');
    }
}
