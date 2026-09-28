<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\View\ComponentAttributeBag;

class DataList extends DaisyComponent
{
    protected const VIEW = 'lazy::list';

    public array $items;

    public function __construct(array $items = [])
    {
        $this->items = array_values($items);
    }

    protected function componentClasses(array $data, ComponentAttributeBag $attributes): array
    {
        return ['list'];
    }
}
