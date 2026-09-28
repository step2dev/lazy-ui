<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\View\ComponentAttributeBag;

class Step extends DaisyComponent
{
    protected const VIEW = 'lazy::step';

    public function __construct(public string $color = '') {}

    protected function componentClasses(array $data, ComponentAttributeBag $attributes): array
    {
        return [
            'step',
            'step-primary' => $this->color === 'primary',
            'step-secondary' => $this->color === 'secondary',
            'step-accent' => $this->color === 'accent',
            'step-neutral' => $this->color === 'neutral',
            'step-info' => $this->color === 'info',
            'step-success' => $this->color === 'success',
            'step-warning' => $this->color === 'warning',
            'step-error' => $this->color === 'error',
        ];
    }
}
