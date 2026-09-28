<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\View\ComponentAttributeBag;

class Calendar extends DaisyComponent
{
    protected const VIEW = 'lazy::calendar';

    public function __construct(
        public string $driver = 'native',
        public ?string $value = null,
    ) {}

    protected function componentClasses(array $data, ComponentAttributeBag $attributes): array
    {
        return match ($this->driver) {
            'cally' => ['cally bg-base-100 border border-base-300 shadow-lg rounded-box'],
            'vanilla' => ['vc'],
            default => ['input'],
        };
    }

    protected function componentData(array $data, ComponentAttributeBag $attributes): array
    {
        return ['tag' => match ($this->driver) {
            'cally' => 'cally',
            'vanilla' => 'vanilla',
            default => 'native',
        }];
    }
}
