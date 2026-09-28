<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\View\ComponentAttributeBag;

class Toast extends DaisyComponent
{
    protected const VIEW = 'lazy::toast';

    public function __construct(
        public bool $top = true,
        public bool $middle = false,
        public bool $bottom = false,
        public bool $start = false,
        public bool $center = false,
        public bool $end = true,
    ) {}

    protected function componentClasses(array $data, ComponentAttributeBag $attributes): array
    {
        return [
            'toast',
            'toast-top' => $this->top,
            'toast-middle' => $this->middle,
            'toast-bottom' => $this->bottom,
            'toast-start' => $this->start,
            'toast-center' => $this->center,
            'toast-end' => $this->end,
            'z-[1000]',
        ];
    }

    protected function componentData(array $data, ComponentAttributeBag $attributes): array
    {
        return ['notify' => session('notify-flash')];
    }
}
