<?php

namespace App\View\Components\Admin\Btn;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Back extends Component
{
    public function render(): View
    {
        return view('lazy::btn.back');
    }
}
