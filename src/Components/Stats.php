<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\View\ComponentAttributeBag;

class Stats extends DaisyComponent
{
    protected const VIEW = 'lazy::stats';

    public array $stats = [];

    public function __construct(
        array $items = [],
        public bool $vertical = false,
        public bool $horizontal = false,
    ) {
        foreach ($items as $item) {
            $normalized = is_array($item) ? $item : ['value' => $item];

            $this->stats[] = [
                'title' => (string) ($normalized['title'] ?? ''),
                'value' => $normalized['value'] ?? '',
                'description' => (string) ($normalized['description'] ?? $normalized['desc'] ?? ''),
                'figure' => $normalized['figure'] ?? null,
                'actions' => $normalized['actions'] ?? null,
                'classes' => $this->classes([
                    'stat',
                    (string) ($normalized['class'] ?? '') => isset($normalized['class']),
                ]),
            ];
        }
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
