<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\View\ComponentAttributeBag;

class HoverGallery extends DaisyComponent
{
    protected const VIEW = 'lazy::hover-gallery';

    protected function componentClasses(array $data, ComponentAttributeBag $attributes): array
    {
        return ['hover-gallery'];
    }
}
