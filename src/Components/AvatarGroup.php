<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\View\ComponentAttributeBag;

class AvatarGroup extends DaisyComponent
{
    protected const VIEW = 'lazy::avatar-group';

    public function __construct(public string $spacing = '6') {}

    protected function componentClasses(array $data, ComponentAttributeBag $attributes): array
    {
        return [
            'avatar-group',
            '-space-x-1' => $this->spacing === '1',
            '-space-x-2' => $this->spacing === '2',
            '-space-x-3' => $this->spacing === '3',
            '-space-x-4' => $this->spacing === '4',
            '-space-x-5' => $this->spacing === '5',
            '-space-x-6' => $this->spacing === '6',
            '-space-x-8' => $this->spacing === '8',
        ];
    }
}
