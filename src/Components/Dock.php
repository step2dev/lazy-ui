<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\View\ComponentAttributeBag;

class Dock extends DaisyComponent
{
    protected const VIEW = 'lazy::dock';

    public function __construct(public string $size = '') {}

    protected function componentClasses(array $data, ComponentAttributeBag $attributes): array
    {
        return [
            'dock',
            'dock-xs' => $this->size === 'xs',
            'dock-sm' => $this->size === 'sm',
            'dock-md' => $this->size === 'md',
            'dock-lg' => $this->size === 'lg',
            'dock-xl' => $this->size === 'xl',
        ];
    }
}
