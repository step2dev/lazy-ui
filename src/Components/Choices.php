<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\Contracts\View\View;
use Step2dev\LazyUI\LazyComponent;

class Choices extends LazyComponent
{
    public function __construct(
        public array $options = [],
        public string $label = '',
        public string $placeholder = 'Please select a value',
    ) {}

    public function render(): View
    {
        return view('lazy::choices');
    }
}
