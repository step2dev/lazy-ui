<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\View\ComponentAttributeBag;

class ThemeController extends DaisyComponent
{
    protected const VIEW = 'lazy::theme-controller';

    public function __construct(
        public string $theme = 'light',
        public string $type = 'checkbox',
    ) {}

    protected function componentClasses(array $data, ComponentAttributeBag $attributes): array
    {
        return ['theme-controller'];
    }
}
