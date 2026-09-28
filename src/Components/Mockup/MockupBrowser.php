<?php

namespace Step2dev\LazyUI\Components\Mockup;

use Illuminate\View\ComponentAttributeBag;
use Step2dev\LazyUI\Components\DaisyComponent;

class MockupBrowser extends DaisyComponent
{
    protected const VIEW = 'lazy::mockup.browser';

    public function __construct(public string $url = '') {}

    protected function componentClasses(array $data, ComponentAttributeBag $attributes): array
    {
        return ['mockup-browser border border-base-300'];
    }
}
