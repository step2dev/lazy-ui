<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\View\ComponentAttributeBag;

class Checkbox extends DaisyComponent
{
    protected const VIEW = 'lazy::checkbox';

    public function __construct(
        ?string $label = '',
        public string $color = '',
        public string $size = '',
    ) {
        $this->label = $label ?? '';
    }

    protected function prepareAttributes(ComponentAttributeBag $attributes): ComponentAttributeBag
    {
        $attributes['type'] = 'checkbox';

        return $attributes;
    }

    protected function componentClasses(array $data, ComponentAttributeBag $attributes): array
    {
        return [
            'checkbox',
            'checkbox-neutral' => $this->color === 'neutral',
            'checkbox-primary' => $this->color === 'primary',
            'checkbox-secondary' => $this->color === 'secondary',
            'checkbox-accent' => $this->color === 'accent',
            'checkbox-success' => $this->color === 'success',
            'checkbox-warning' => $this->color === 'warning',
            'checkbox-info' => $this->color === 'info',
            'checkbox-error' => $this->color === 'error',
            'checkbox-xl' => $this->size === 'xl',
            'checkbox-lg' => $this->size === 'lg',
            'checkbox-md' => $this->size === 'md',
            'checkbox-sm' => $this->size === 'sm',
            'checkbox-xs' => $this->size === 'xs',
        ];
    }
}
