<?php

namespace Lazyadm\LazyComponent\Components\Btn;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BtnDelete extends Component
{
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('lazy::btn.delete');
    }
}
