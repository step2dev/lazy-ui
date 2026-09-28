<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\View\ComponentAttributeBag;

class Steps extends DaisyComponent
{
    protected const VIEW = 'lazy::steps';

    public array $steps;

    public function __construct(
        array $items = [],
        public int|string|null $current = null,
        public string $color = 'primary',
        public bool $vertical = false,
    ) {
        $this->steps = [];

        foreach (array_values($items) as $index => $item) {
            $normalized = is_array($item) ? $item : ['label' => $item];
            $position = $index + 1;
            $active = (bool) ($normalized['active'] ?? ($this->current !== null && $position <= (int) $this->current));

            $this->steps[] = [
                'label' => (string) ($normalized['label'] ?? $normalized['title'] ?? $position),
                'icon' => $normalized['icon'] ?? null,
                'active' => $active,
                'color' => (string) ($normalized['color'] ?? $this->color),
            ];
        }
    }

    protected function componentClasses(array $data, ComponentAttributeBag $attributes): array
    {
        return [
            'steps',
            'steps-vertical' => $this->vertical,
            'steps-horizontal' => ! $this->vertical,
        ];
    }
}
