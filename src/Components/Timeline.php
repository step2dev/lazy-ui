<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\View\ComponentAttributeBag;

class Timeline extends DaisyComponent
{
    protected const VIEW = 'lazy::timeline';

    public array $items = [];

    public function __construct(
        array $items = [],
        public bool $vertical = false,
        public bool $compact = false,
        public bool $snapIcon = false,
        public bool $box = false,
    ) {
        $lastIndex = count($items) - 1;

        foreach (array_values($items) as $index => $item) {
            $normalized = is_array($item) ? $item : ['end' => $item];

            $this->items[] = [
                'start' => $normalized['start'] ?? null,
                'middle' => $normalized['middle'] ?? $normalized['icon'] ?? null,
                'end' => $normalized['end'] ?? $normalized['content'] ?? $normalized['label'] ?? null,
                'before' => $index > 0,
                'after' => $index < $lastIndex,
                'startClasses' => $this->classes([
                    'timeline-start',
                    'timeline-box' => $this->box || (bool) ($normalized['box'] ?? false),
                ]),
                'middleClasses' => 'timeline-middle',
                'endClasses' => $this->classes([
                    'timeline-end',
                    'timeline-box' => $this->box || (bool) ($normalized['box'] ?? false),
                ]),
            ];
        }
    }

    protected function componentData(array $data, ComponentAttributeBag $attributes): array
    {
        $items = $this->items;

        if ($this->truthy($attributes->get('unstyled'))) {
            $items = array_map(static fn (array $item): array => [
                ...$item,
                'startClasses' => '',
                'middleClasses' => '',
                'endClasses' => '',
            ], $items);
        }

        return ['items' => $items];
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
