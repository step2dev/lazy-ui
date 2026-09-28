<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\View\ComponentAttributeBag;

class Footer extends DaisyComponent
{
    protected const VIEW = 'lazy::footer';

    public function __construct(
        public bool $horizontal = false,
        public bool $center = false,
    ) {}

    protected function componentClasses(array $data, ComponentAttributeBag $attributes): array
    {
        return [
            'footer',
            'footer-horizontal' => $this->horizontal,
            'footer-center' => $this->center,
        ];
    }
}
