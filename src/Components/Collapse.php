<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\View\ComponentAttributeBag;

class Collapse extends DaisyComponent
{
    protected const VIEW = 'lazy::collapse';

    public function __construct(
        public string $title = '',
        public bool $open = false,
        public bool $arrow = true,
        public bool $plus = false,
    ) {}

    protected function viewClasses(): array
    {
        return [
            'title' => 'collapse-title',
            'content' => 'collapse-content',
        ];
    }

    protected function componentClasses(array $data, ComponentAttributeBag $attributes): array
    {
        return [
            'collapse',
            'collapse-arrow' => $this->arrow && ! $this->plus,
            'collapse-plus' => $this->plus,
        ];
    }
}
