<?php

namespace Step2dev\LazyUI\Components\Form;

use Illuminate\Contracts\View\View;
use Step2dev\LazyUI\LazyComponent;
use Step2dev\LazyUI\Traits\ResolvesFormFieldState;

class FormTextarea extends LazyComponent
{
    use ResolvesFormFieldState;

    public ?string $placeholder;

    public function __construct(
        public string $label = '',
        string $placeholder = '',
        public bool $required = false,
        public string $help = '',
        public bool $hr = false,
        public string $outerClass = '',
        public string $src = '',
    ) {
        $this->placeholder = (string) str($placeholder ?: $this->label)->trim()->ucfirst();
    }

    public function render(): \Closure|View
    {
        return function (array $data) {
            $attributes = $this->getAttributesFromData($data);
            $attributes['required'] = $this->required;
            $data['attributes'] = $attributes;

            return view('lazy::form.textarea', [
                ...$this->mergeData($data),
                ...$this->resolveFieldState($data, $attributes),
            ])->render();
        };
    }
}
