<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\View\ComponentAttributeBag;

class MenuList extends DaisyComponent
{
    protected const VIEW = 'lazy::menu-list';

    public function __construct(
        public string $size = '',
        public bool $horizontal = false,
        public bool $paged = false,
    ) {}

    protected function componentClasses(array $data, ComponentAttributeBag $attributes): array
    {
        return [
            'menu',
            'menu-vertical' => ! $this->horizontal,
            'menu-horizontal' => $this->horizontal,
            'menu-paged' => $this->paged,
            'menu-xs' => $this->size === 'xs',
            'menu-sm' => $this->size === 'sm',
            'menu-md' => $this->size === 'md',
            'menu-lg' => $this->size === 'lg',
            'menu-xl' => $this->size === 'xl',
        ];
    }
}
