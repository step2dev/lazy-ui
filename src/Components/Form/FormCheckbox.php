<?php

namespace Lazyadm\LazyComponent\Components\Form;

use Illuminate\Contracts\View\View;
use Lazyadm\LazyComponent\LazyComponent;

class FormCheckbox extends LazyComponent
{
    public function __construct(string $label = '')
    {
        $this->label = $label;
    }

    public function render(): \Closure|View
    {
        return function (array $data) {
            return view('lazy::form.checkbox', $this->mergeData($data))->render();
        };
    }
}
