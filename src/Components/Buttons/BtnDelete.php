<?php

namespace Step2dev\LazyUI\Components\Buttons;

use Closure;
use Illuminate\Contracts\View\View;
use Step2dev\LazyUI\LazyComponent;

class BtnDelete extends LazyComponent
{
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): Closure|View
    {
        return function (array $data) {
            return view('lazy::btn.delete', $this->mergeData($data))->render();
        };
    }
}
