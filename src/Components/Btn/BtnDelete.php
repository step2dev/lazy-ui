<?php

namespace Lazyadm\LazyComponent\Components\Btn;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Lazyadm\LazyComponent\LazyComponent;

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
