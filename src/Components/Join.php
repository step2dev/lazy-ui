<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\View\ComponentAttributeBag;

class Join extends DaisyComponent
{
    protected const VIEW = 'lazy::join';

    public bool $join = true;

    public function __construct(public string $position = '') {}

    protected function componentClasses(array $data, ComponentAttributeBag $attributes): array
    {
        $position = $this->position;

        if ($attributes->has('vertical')) {
            $position = 'vertical';
        } elseif ($attributes->has('horizontal')) {
            $position = 'horizontal';
        }

        return [
            'join',
            'join-vertical' => $position === 'vertical',
            'join-horizontal' => $position === 'horizontal',
        ];
    }

    protected function consumedAttributes(): array
    {
        return ['vertical', 'horizontal'];
    }
}
