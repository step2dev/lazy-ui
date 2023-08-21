<?php

namespace Step2dev\LazyUI\Components\Form;

use Illuminate\Contracts\View\View;
use Step2dev\LazyUI\LazyComponent;

class FormToggle extends LazyComponent
{
    public function __construct(public string $label = '')
    {
    }

    public function render(): \Closure|View
    {
        return function (array $data) {
            return view('lazy::form.toggle', $this->mergeData($data))->render();
        };
    }
}
