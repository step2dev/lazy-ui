<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\View\ComponentAttributeBag;

class Stats extends DaisyComponent
{
    protected const VIEW = 'lazy::stats';

    public array $stats;

    public function __construct(
        array $items = [],
        public bool $vertical = false,
        public bool $horizontal = false,
    ) {
        $this->stats = array_values(array_map(static fn (array $item): array => [
            'title' => (string) ($item['title'] ?? ''),
            'value' => $item['value'] ?? '',
            'description' => (string) ($item['description'] ?? $item['desc'] ?? ''),
        ], $items));
    }

    protected function componentClasses(array $data, ComponentAttributeBag $attributes): array
    {
        return [
            'stats',
            'stats-vertical' => $this->vertical,
            'stats-horizontal' => $this->horizontal,
        ];
    }
}
