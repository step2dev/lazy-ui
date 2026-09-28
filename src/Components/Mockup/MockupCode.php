<?php

namespace Step2dev\LazyUI\Components\Mockup;

use Step2dev\LazyUI\Components\DaisyComponent;

class MockupCode extends DaisyComponent
{
    protected const VIEW = 'lazy::mockup.code';

    public function __construct(public string $prefix = '$') {}
}
