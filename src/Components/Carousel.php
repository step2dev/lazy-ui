<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\View\ComponentAttributeBag;

class Carousel extends DaisyComponent
{
    protected const VIEW = 'lazy::carousel';

    public function __construct(
        public bool $vertical = false,
        public bool $center = false,
        public bool $end = false,
    ) {}

    protected function componentClasses(array $data, ComponentAttributeBag $attributes): array
    {
        return [
            'carousel',
            'carousel-vertical' => $this->vertical,
            'carousel-center' => $this->center,
            'carousel-end' => $this->end,
        ];
    }
}
