<?php

namespace Step2dev\LazyUI\Components\Mockup;

use Illuminate\View\ComponentAttributeBag;
use Step2dev\LazyUI\Components\DaisyComponent;

class MockupWindow extends DaisyComponent
{
    protected const VIEW = 'lazy::mockup.window';

    protected function componentClasses(array $data, ComponentAttributeBag $attributes): array
    {
        return ['mockup-window border border-base-300'];
    }
}
