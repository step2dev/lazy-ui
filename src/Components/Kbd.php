<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\View\ComponentAttributeBag;

class Kbd extends DaisyComponent
{
    protected const VIEW = 'lazy::kbd';

    public function __construct(
        public string $value = '',
        public string $size = '',
    ) {}

    protected function componentClasses(array $data, ComponentAttributeBag $attributes): array
    {
        return [
            'kbd',
            'kbd-xl' => $this->size === 'xl',
            'kbd-lg' => $this->size === 'lg',
            'kbd-md' => $this->size === 'md',
            'kbd-sm' => $this->size === 'sm',
            'kbd-xs' => $this->size === 'xs',
        ];
    }
}
