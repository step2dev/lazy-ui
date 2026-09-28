<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\View\ComponentAttributeBag;

class Diff extends DaisyComponent
{
    protected const VIEW = 'lazy::diff';

    protected function viewClasses(): array
    {
        return [
            'first' => 'diff-item-1',
            'second' => 'diff-item-2',
            'resizer' => 'diff-resizer',
        ];
    }

    protected function componentClasses(array $data, ComponentAttributeBag $attributes): array
    {
        return ['diff'];
    }
}
