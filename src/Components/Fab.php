<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\View\ComponentAttributeBag;

class Fab extends DaisyComponent
{
    protected const VIEW = 'lazy::fab';

    public function __construct(
        public bool $flower = false,
        public string $label = 'Menu',
    ) {}

    protected function viewClasses(): array
    {
        return [
            'trigger' => 'btn btn-circle',
            'close' => 'fab-close',
            'main' => 'fab-main-action',
        ];
    }

    protected function componentClasses(array $data, ComponentAttributeBag $attributes): array
    {
        return ['fab', 'fab-flower' => $this->flower];
    }
}
