<?php

namespace Step2dev\LazyUI\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Step2dev\LazyUI\LazyComponent;

class Indicator extends LazyComponent
{
    public $indicator;

    public $indicatorClass;

    public function __construct($indicator = null, $indicatorClass = 'badge badge-secondary')
    {
        $this->indicator = $indicator;
        $this->indicatorClass = $indicatorClass;
    }

    public function render(): View|Closure
    {
        return view('components.indicator');
    }
}
