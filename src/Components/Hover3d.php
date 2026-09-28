<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\View\ComponentAttributeBag;

class Hover3d extends DaisyComponent
{
    protected const VIEW = 'lazy::hover-3d';

    public array $zones;

    public function __construct(public int $zoneCount = 8)
    {
        $this->zones = range(1, max(1, min(16, $this->zoneCount)));
    }

    protected function componentClasses(array $data, ComponentAttributeBag $attributes): array
    {
        return ['hover-3d'];
    }
}
