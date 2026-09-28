<?php

namespace Step2dev\LazyUI\Components;

class Hero extends DaisyComponent
{
    protected const VIEW = 'lazy::hero';

    public function __construct(
        public string $title = '',
        public string $description = '',
    ) {}
}
