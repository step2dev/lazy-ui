<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\View\ComponentAttributeBag;

class Diff extends DaisyComponent
{
    protected const VIEW = 'lazy::diff';

    protected function componentClasses(array $data, ComponentAttributeBag $attributes): array
    {
        return ['diff'];
    }
}
