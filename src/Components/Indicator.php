<?php

namespace Step2dev\LazyUI\Components;

class Indicator extends DaisyComponent
{
    protected const VIEW = 'lazy::indicator';

    public function __construct(
        public mixed $indicator = null,
        public ?string $indicatorClass = null,
    ) {}
}
