<?php

namespace Step2dev\LazyUI\Components\Form;

use Illuminate\Contracts\View\View;
use Step2dev\LazyUI\LazyComponent;

class FormImage extends LazyComponent
{
    public ?string $placeholder;

    public function __construct(public string $label = '', string $placeholder = '', public bool $required = false)
    {
        $this->placeholder = (string) str($placeholder ?: $this->label)->trim()->ucfirst();
    }

    public function render(): \Closure|View
    {
        return function (array $data) {
            $data['attributes']['required'] = $this->required;

            return view('lazy::form.image', $this->mergeData($data))->render();
        };
    }
}
