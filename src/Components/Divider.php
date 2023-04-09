<?php

namespace Lazyadm\LazyComponent\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Divider extends Component
{
    public function render(): View
    {
        return view('lazy::divider');
    }
}
