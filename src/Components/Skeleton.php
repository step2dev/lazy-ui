<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\View\ComponentAttributeBag;

class Skeleton extends DaisyComponent
{
    protected const VIEW = 'lazy::skeleton';

    protected function componentClasses(array $data, ComponentAttributeBag $attributes): array
    {
        return ['skeleton'];
    }
}
