<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\View\ComponentAttributeBag;

class Fab extends DaisyComponent
{
    protected const VIEW = 'lazy::fab';

    public function __construct(
        public bool $flower = false,
        public string $label = 'Menu',
    ) {}

    protected function componentClasses(array $data, ComponentAttributeBag $attributes): array
    {
        return ['fab', 'fab-flower' => $this->flower];
    }
}
