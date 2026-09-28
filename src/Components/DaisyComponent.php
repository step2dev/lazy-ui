<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\Contracts\View\View;
use Step2dev\LazyUI\LazyComponent;

abstract class DaisyComponent extends LazyComponent
{
    protected const VIEW = '';

    public function render(): View
    {
        return view(static::VIEW);
    }
}
