<?php

namespace Lazyadm\LazyComponent\Components\Form;

use Illuminate\Contracts\View\View;
use Lazyadm\LazyComponent\Components\Checkbox;
use Lazyadm\LazyComponent\LazyComponent;

class FormToggle extends LazyComponent
{
    public function __construct(public string $label = '') {
    }

    public function render(): \Closure|View
    {
        return function (array $data) {
            return view('lazy::form.toggle', $this->mergeData($data))->render();
        };
    }
}
