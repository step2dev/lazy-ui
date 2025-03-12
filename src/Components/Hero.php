<?php

namespace Step2dev\LazyUI\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Step2dev\LazyUI\LazyComponent;

class Hero extends LazyComponent
{
    public $title;
    public $description;

    public function __construct($title, $description)
    {
        $this->title = $title;
        $this->description = $description;
    }

    public function render(): View|Closure
    {
        return view('components.hero');
    }
}
