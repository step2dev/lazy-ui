<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\View\ComponentAttributeBag;

class ListRow extends DaisyComponent
{
    protected const VIEW = 'lazy::list-row';

    protected function componentClasses(array $data, ComponentAttributeBag $attributes): array
    {
        return ['list-row'];
    }
}
