<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\View\ComponentAttributeBag;

class TextRotate extends DaisyComponent
{
    protected const VIEW = 'lazy::text-rotate';

    public array $items;

    public function __construct(array $items = [])
    {
        $this->items = array_values(array_map(static fn ($item): string => (string) $item, $items));
    }

    protected function componentClasses(array $data, ComponentAttributeBag $attributes): array
    {
        return ['text-rotate'];
    }
}
