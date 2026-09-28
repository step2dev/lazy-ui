<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\View\ComponentAttributeBag;

class Stack extends DaisyComponent
{
    protected const VIEW = 'lazy::stack';

    public function __construct(
        public bool $top = false,
        public bool $bottom = false,
        public bool $start = false,
        public bool $end = false,
    ) {}

    protected function componentClasses(array $data, ComponentAttributeBag $attributes): array
    {
        return [
            'stack',
            'stack-top' => $this->top,
            'stack-bottom' => $this->bottom,
            'stack-start' => $this->start,
            'stack-end' => $this->end,
        ];
    }
}
