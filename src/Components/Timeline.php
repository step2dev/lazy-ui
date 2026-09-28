<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\View\ComponentAttributeBag;

class Timeline extends DaisyComponent
{
    protected const VIEW = 'lazy::timeline';

    public array $items;

    public function __construct(
        array $items = [],
        public bool $vertical = false,
        public bool $compact = false,
        public bool $snapIcon = false,
        public bool $box = false,
    ) {
        $this->items = array_values(array_map(static fn ($item): array => is_array($item) ? [
            'start' => $item['start'] ?? null,
            'middle' => $item['middle'] ?? null,
            'end' => $item['end'] ?? $item['content'] ?? $item['label'] ?? null,
        ] : [
            'start' => null,
            'middle' => null,
            'end' => $item,
        ], $items));
    }

    protected function componentClasses(array $data, ComponentAttributeBag $attributes): array
    {
        return [
            'timeline',
            'timeline-vertical' => $this->vertical,
            'timeline-horizontal' => ! $this->vertical,
            'timeline-compact' => $this->compact,
            'timeline-snap-icon' => $this->snapIcon,
        ];
    }
}
