<?php

namespace Lazyadm\LazyComponent\Components\Btn;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BtnLogout extends Component
{
    public function render(): View
    {
        return view('lazy::btn.logout');
    }
}
