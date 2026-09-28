<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\View\ComponentAttributeBag;

class CarouselItem extends DaisyComponent
{
    protected const VIEW = 'lazy::carousel-item';

    protected function componentClasses(array $data, ComponentAttributeBag $attributes): array
    {
        return ['carousel-item'];
    }
}
