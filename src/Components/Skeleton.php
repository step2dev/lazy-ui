<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\View\ComponentAttributeBag;

class Skeleton extends DaisyComponent
{
    protected const VIEW = 'lazy::skeleton';

    public function __construct(public bool $text = false) {}

    protected function componentClasses(array $data, ComponentAttributeBag $attributes): array
    {
        return [
            'skeleton',
            'skeleton-text' => $this->text,
        ];
    }
}
