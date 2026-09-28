<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\View\ComponentAttributeBag;

class Radio extends DaisyComponent
{
    protected const VIEW = 'lazy::radio';

    public function __construct(
        public string $color = '',
        public string $size = '',
    ) {}

    protected function prepareAttributes(ComponentAttributeBag $attributes): ComponentAttributeBag
    {
        $attributes['type'] = 'radio';

        return $attributes;
    }

    protected function componentClasses(array $data, ComponentAttributeBag $attributes): array
    {
        return [
            'radio',
            'radio-neutral' => $this->color === 'neutral',
            'radio-primary' => $this->color === 'primary',
            'radio-secondary' => $this->color === 'secondary',
            'radio-accent' => $this->color === 'accent',
            'radio-info' => $this->color === 'info',
            'radio-success' => $this->color === 'success',
            'radio-warning' => $this->color === 'warning',
            'radio-error' => $this->color === 'error',
            'radio-xl' => $this->size === 'xl',
            'radio-lg' => $this->size === 'lg',
            'radio-md' => $this->size === 'md',
            'radio-sm' => $this->size === 'sm',
            'radio-xs' => $this->size === 'xs',
        ];
    }
}
