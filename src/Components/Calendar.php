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
        return match ($this->normalizedDriver()) {
            'cally' => ['cally bg-base-100 border border-base-300 shadow-lg rounded-box'],
            'vc' => ['vc'],
            'react-day-picker' => ['react-day-picker'],
            default => ['input'],
        };
    }

    protected function componentData(array $data, ComponentAttributeBag $attributes): array
    {
        return ['tag' => $this->normalizedDriver()];
    }

    private function normalizedDriver(): string
    {
        return match (strtolower($this->driver)) {
            'cally' => 'cally',
            'vanilla', 'vanilla-calendar', 'vc' => 'vc',
            'react', 'react-day-picker', 'day-picker' => 'react-day-picker',
            default => 'native',
        };
    }
}
