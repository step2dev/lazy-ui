<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\View\ComponentAttributeBag;

class Stat extends DaisyComponent
{
    protected const VIEW = 'lazy::stat';

    public function __construct(
        public string $title = '',
        public string|int|float $value = '',
        public string $description = '',
    ) {}

    protected function componentClasses(array $data, ComponentAttributeBag $attributes): array
    {
        return ['stat'];
    }
}
