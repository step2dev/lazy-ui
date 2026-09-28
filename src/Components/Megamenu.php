<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\View\ComponentAttributeBag;

class Megamenu extends DaisyComponent
{
    protected const VIEW = 'lazy::megamenu';

    public function __construct(
        public bool $wide = false,
        public bool $full = false,
        public bool $vertical = false,
        public string $size = '',
    ) {}

    protected function viewClasses(): array
    {
        return ['active' => 'megamenu-active'];
    }

    protected function componentClasses(array $data, ComponentAttributeBag $attributes): array
    {
        return [
            'megamenu',
            'megamenu-wide' => $this->wide,
            'megamenu-full' => $this->full,
            'megamenu-vertical' => $this->vertical,
            'megamenu-xs' => $this->size === 'xs',
            'megamenu-sm' => $this->size === 'sm',
            'megamenu-md' => $this->size === 'md',
            'megamenu-lg' => $this->size === 'lg',
            'megamenu-xl' => $this->size === 'xl',
        ];
    }
}
