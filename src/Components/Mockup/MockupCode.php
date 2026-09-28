<?php

namespace Step2dev\LazyUI\Components\Mockup;

use Illuminate\View\ComponentAttributeBag;
use Step2dev\LazyUI\Components\DaisyComponent;

class MockupCode extends DaisyComponent
{
    protected const VIEW = 'lazy::mockup.code';

    public function __construct(public string $prefix = '$') {}

    protected function componentClasses(array $data, ComponentAttributeBag $attributes): array
    {
        return ['mockup-code'];
    }
}
