<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\Contracts\View\View;
use Step2dev\LazyUI\LazyComponent;

class FormGroup extends LazyComponent
{
    public function __construct(string $label = '')
    {
        $this->label = $label;
    }

    public function render(): \Closure|View
    {
        return function (array $data) {
            return view('lazy::form-group', $this->mergeData($data))->render();
        };
    }
}
