<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\View\ComponentAttributeBag;

class Fieldset extends DaisyComponent
{
    protected const VIEW = 'lazy::fieldset';

    public function __construct(
        public string $legend = '',
        public string $label = '',
        public string $hint = '',
    ) {}

    protected function viewClasses(): array
    {
        return [
            'legend' => 'fieldset-legend',
            'label' => 'label',
            'hint' => 'label',
        ];
    }

    protected function componentClasses(array $data, ComponentAttributeBag $attributes): array
    {
        return ['fieldset'];
    }
}
