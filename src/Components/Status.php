<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\View\ComponentAttributeBag;

class Status extends DaisyComponent
{
    protected const VIEW = 'lazy::status';

    public function __construct(
        public string $color = '',
        public string $size = '',
    ) {}

    protected function componentClasses(array $data, ComponentAttributeBag $attributes): array
    {
        return [
            'status',
            'status-neutral' => $this->color === 'neutral',
            'status-primary' => $this->color === 'primary',
            'status-secondary' => $this->color === 'secondary',
            'status-accent' => $this->color === 'accent',
            'status-info' => $this->color === 'info',
            'status-success' => $this->color === 'success',
            'status-warning' => $this->color === 'warning',
            'status-error' => $this->color === 'error',
            'status-xs' => $this->size === 'xs',
            'status-sm' => $this->size === 'sm',
            'status-md' => $this->size === 'md',
            'status-lg' => $this->size === 'lg',
            'status-xl' => $this->size === 'xl',
        ];
    }
}
