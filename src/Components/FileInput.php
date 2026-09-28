<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\View\ComponentAttributeBag;

class FileInput extends DaisyComponent
{
    protected const VIEW = 'lazy::file-input';

    public function __construct(
        public string $color = '',
        public string $size = '',
        public bool $ghost = false,
    ) {}

    protected function viewClasses(): array
    {
        return ['join' => 'join-item'];
    }

    protected function componentClasses(array $data, ComponentAttributeBag $attributes): array
    {
        return [
            'file-input',
            'file-input-ghost' => $this->ghost,
            'file-input-primary' => $this->color === 'primary',
            'file-input-secondary' => $this->color === 'secondary',
            'file-input-accent' => $this->color === 'accent',
            'file-input-neutral' => $this->color === 'neutral',
            'file-input-info' => $this->color === 'info',
            'file-input-success' => $this->color === 'success',
            'file-input-warning' => $this->color === 'warning',
            'file-input-error' => $this->color === 'error',
            'file-input-xs' => $this->size === 'xs',
            'file-input-sm' => $this->size === 'sm',
            'file-input-md' => $this->size === 'md',
            'file-input-lg' => $this->size === 'lg',
            'file-input-xl' => $this->size === 'xl',
        ];
    }
}
