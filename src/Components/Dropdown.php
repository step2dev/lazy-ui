<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\View\ComponentAttributeBag;

class Dropdown extends DaisyComponent
{
    protected const VIEW = 'lazy::dropdown';

    public function __construct(
        public string $label = 'Menu',
        public bool $hover = false,
        public bool $open = false,
        public bool $close = false,
        public bool $start = false,
        public bool $center = false,
        public bool $end = false,
        public bool $top = false,
        public bool $bottom = false,
        public bool $left = false,
        public bool $right = false,
    ) {}

    protected function viewClasses(): array
    {
        return [
            'trigger' => 'btn',
            'content' => 'dropdown-content menu bg-base-100 rounded-box z-10 mt-2 w-52 p-2 shadow-sm',
        ];
    }

    protected function componentClasses(array $data, ComponentAttributeBag $attributes): array
    {
        return [
            'dropdown',
            'dropdown-hover' => $this->hover,
            'dropdown-open' => $this->open,
            'dropdown-close' => $this->close,
            'dropdown-start' => $this->start,
            'dropdown-center' => $this->center,
            'dropdown-end' => $this->end,
            'dropdown-top' => $this->top,
            'dropdown-bottom' => $this->bottom,
            'dropdown-left' => $this->left,
            'dropdown-right' => $this->right,
        ];
    }
}
