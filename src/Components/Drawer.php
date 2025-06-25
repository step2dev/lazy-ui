<?php

namespace Step2dev\LazyUI\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Step2dev\LazyUI\LazyComponent;

class Drawer extends LazyComponent
{
    public $drawerContent;

    public function __construct($drawerContent)
    {
        $this->drawerContent = $drawerContent;
    }

    public function render(): View|Closure
    {
        return view('components.drawer');
    }
}
