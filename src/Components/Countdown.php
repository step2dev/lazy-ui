<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\View\ComponentAttributeBag;

class Countdown extends DaisyComponent
{
    protected const VIEW = 'lazy::countdown';

    public int $resolvedValue;

    public function __construct(
        public int|float|string $value = 0,
        public string $label = '',
    ) {
        $this->resolvedValue = max(0, min(999, (int) $this->value));
    }

    protected function componentClasses(array $data, ComponentAttributeBag $attributes): array
    {
        return ['countdown'];
    }
}
