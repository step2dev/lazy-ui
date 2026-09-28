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

    protected function viewClasses(): array
    {
        return [
            'toolbar' => 'mockup-browser-toolbar',
            'url' => 'input border border-base-300',
            'content' => 'border-t border-base-300',
        ];
    }
}
