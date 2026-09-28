<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\View\ComponentAttributeBag;

class Loading extends DaisyComponent
{
    protected const VIEW = 'lazy::loading';

    public function __construct(
        public string $type = 'spinner',
        public string $size = 'md',
        public string $color = '',
    ) {}

    protected function componentClasses(array $data, ComponentAttributeBag $attributes): array
    {
        $type = $this->type;

        foreach (['spinner', 'dots', 'ring', 'ball', 'bars', 'infinity'] as $candidate) {
            if ($attributes->has($candidate) && $this->truthy($attributes->get($candidate))) {
                $type = $candidate;
                break;
            }
        }

        return [
            'loading',
            'loading-xl' => $this->size === 'xl',
            'loading-xs' => $this->size === 'xs',
            'loading-sm' => $this->size === 'sm',
            'loading-md' => $this->size === 'md',
            'loading-lg' => $this->size === 'lg',
            'loading-spinner' => $type === 'spinner',
            'loading-dots' => $type === 'dots',
            'loading-ring' => $type === 'ring',
            'loading-ball' => $type === 'ball',
            'loading-bars' => $type === 'bars',
            'loading-infinity' => $type === 'infinity',
            'text-primary' => $this->color === 'primary',
            'text-secondary' => $this->color === 'secondary',
            'text-accent' => $this->color === 'accent',
            'text-neutral' => $this->color === 'neutral',
            'text-info' => $this->color === 'info',
            'text-success' => $this->color === 'success',
            'text-warning' => $this->color === 'warning',
            'text-error' => $this->color === 'error',
        ];
    }

    protected function consumedAttributes(): array
    {
        return ['spinner', 'dots', 'ring', 'ball', 'bars', 'infinity'];
    }
}
