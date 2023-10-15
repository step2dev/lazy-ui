<?php

namespace Step2dev\LazyUI\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Step2dev\LazyUI\LazyComponent;

class Menu extends LazyComponent
{
    public function __construct(public bool $join = true)
    {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View
     */
    public function render(): View|Closure
    {
        return function (array $data) {
            return view('lazy::menu', $this->mergeData($data))->render();
        };
    }
}
