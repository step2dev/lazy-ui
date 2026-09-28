<?php

namespace Step2dev\LazyUI\Components;

class Countdown extends DaisyComponent
{
    protected const VIEW = 'lazy::countdown';

    public function __construct(
        public int|float|string $value = 0,
        public string $label = '',
    ) {}
}
