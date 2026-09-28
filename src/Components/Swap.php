<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\View\ComponentAttributeBag;

class Swap extends DaisyComponent
{
    protected const VIEW = 'lazy::swap';

    public function __construct(
        public bool $active = false,
        public bool $rotate = false,
        public bool $flip = false,
    ) {}

    protected function componentClasses(array $data, ComponentAttributeBag $attributes): array
    {
        return [
            'swap',
            'swap-active' => $this->active,
            'swap-rotate' => $this->rotate,
            'swap-flip' => $this->flip,
        ];
    }
}
