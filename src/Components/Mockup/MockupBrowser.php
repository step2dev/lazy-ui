<?php

namespace Step2dev\LazyUI\Components\Mockup;

use Step2dev\LazyUI\Components\DaisyComponent;

class MockupBrowser extends DaisyComponent
{
    protected const VIEW = 'lazy::mockup.browser';

    public function __construct(public string $url = '') {}
}
