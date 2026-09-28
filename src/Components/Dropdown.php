<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\View\ComponentAttributeBag;

class Dropdown extends DaisyComponent
{
    protected const VIEW = 'lazy::dropdown';

    public function __construct(
        public string $label = 'Menu',
        public string $position = '',
        public string $width = 'w-52',
        public string $contentClass = '',
        public bool $contentDefaults = true,
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
            'content' => $this->classes([
                'dropdown-content',
                'menu bg-base-100 rounded-box z-10 mt-2 p-2 shadow-sm' => $this->contentDefaults,
                $this->width => $this->width !== '',
                $this->contentClass => $this->contentClass !== '',
            ]),
        ];
    }

    protected function componentClasses(array $data, ComponentAttributeBag $attributes): array
    {
        $position = $this->position;

        return [
            'dropdown',
            'dropdown-hover' => $this->hover,
            'dropdown-open' => $this->open,
            'dropdown-close' => $this->close,
            'dropdown-start' => $this->start || $position === 'start',
            'dropdown-center' => $this->center || $position === 'center',
            'dropdown-end' => $this->end || $position === 'end',
            'dropdown-top' => $this->top || $position === 'top',
            'dropdown-bottom' => $this->bottom || $position === 'bottom',
            'dropdown-left' => $this->left || $position === 'left',
            'dropdown-right' => $this->right || $position === 'right',
        ];
    }
}
