<?php

namespace Step2dev\LazyUI\Components\Form;

use Illuminate\Contracts\View\View;
use Step2dev\LazyUI\LazyComponent;
use Step2dev\LazyUI\Traits\ResolvesFormFieldState;

class FormCheckbox extends LazyComponent
{
    use ResolvesFormFieldState;

    public function __construct(
        public string $label = '',
        public string $help = '',
        public bool $hr = false,
    ) {}

    public function render(): \Closure|View
    {
        return function (array $data) {
            $attributes = $this->getAttributesFromData($data);

            return view('lazy::form.checkbox', [
                ...$this->mergeData($data),
                ...$this->resolveFieldState($data, $attributes),
            ])->render();
        };
    }
}
