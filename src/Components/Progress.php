<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\View\ComponentAttributeBag;

class Progress extends DaisyComponent
{
    protected const VIEW = 'lazy::progress';

    public function __construct(
        public int|float|null $value = null,
        public int|float $max = 100,
        public string $color = '',
    ) {}

    protected function componentClasses(array $data, ComponentAttributeBag $attributes): array
    {
        return [
            'progress',
            'progress-primary' => $this->color === 'primary',
            'progress-secondary' => $this->color === 'secondary',
            'progress-accent' => $this->color === 'accent',
            'progress-neutral' => $this->color === 'neutral',
            'progress-info' => $this->color === 'info',
            'progress-success' => $this->color === 'success',
            'progress-warning' => $this->color === 'warning',
            'progress-error' => $this->color === 'error',
        ];
    }
}
