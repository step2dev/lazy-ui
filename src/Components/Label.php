<?php

namespace Lazyadm\LazyComponent\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Label extends Component
{
    public string $label;

    public function __construct(
        public bool $hasError = false,
        public ?bool $hr = false,
        string|null $label = null,
        public bool $required = false
    ) {
        $this->label = str($label)->trim()->ucfirst().($required ? ' <i style="color: red">*</i>' : '');
    }

    public function render(): View
    {
        return view('lazy::label');
    }
}
