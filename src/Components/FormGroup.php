<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\Contracts\View\View;
use Step2dev\LazyUI\LazyComponent;
use Step2dev\LazyUI\Traits\ResolvesFormFieldState;

class FormGroup extends LazyComponent
{
    use ResolvesFormFieldState;

    public function __construct(
        string $label = '',
        public string $help = '',
        public bool $hr = false,
    ) {
        $this->label = $label;
    }

    public function render(): \Closure|View
    {
        return function (array $data) {
            $attributes = $this->getAttributesFromData($data);
            $state = $this->resolveFieldState($data, $attributes);

            return view('lazy::form-group', [
                ...$this->mergeData($data),
                ...$state,
            ])->render();
        };
    }
}
