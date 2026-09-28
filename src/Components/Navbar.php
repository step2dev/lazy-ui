<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\View\ComponentAttributeBag;

class Navbar extends DaisyComponent
{
    protected const VIEW = 'lazy::navbar';

    protected function componentClasses(array $data, ComponentAttributeBag $attributes): array
    {
        return ['navbar'];
    }
}
