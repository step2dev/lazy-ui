<?php

namespace Lazyadm\LazyComponent\Components\Form;

use Illuminate\Contracts\View\View;
use Lazyadm\LazyComponent\LazyComponent;

class FormInput extends LazyComponent
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

            return view('lazy::form.input', $this->mergeData($data))->render();
        };
    }
}
