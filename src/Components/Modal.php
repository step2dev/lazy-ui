<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\View\ComponentAttributeBag;

class Modal extends DaisyComponent
{
    protected const VIEW = 'lazy::modal';

    public function __construct(
        public ?string $id = null,
        public bool $open = false,
        public bool $top = false,
        public bool $middle = false,
        public bool $bottom = false,
        public bool $start = false,
        public bool $end = false,
    ) {}

    protected function viewClasses(): array
    {
        return [
            'box' => 'modal-box',
            'title' => 'text-lg font-bold',
            'actions' => 'modal-action',
            'backdrop' => 'modal-backdrop',
        ];
    }

    protected function componentClasses(array $data, ComponentAttributeBag $attributes): array
    {
        return [
            'modal',
            'modal-open' => $this->open,
            'modal-top' => $this->top,
            'modal-middle' => $this->middle,
            'modal-bottom' => $this->bottom,
            'modal-start' => $this->start,
            'modal-end' => $this->end,
        ];
    }
}
