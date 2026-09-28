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
            $key = (string) ($normalized['key'] ?? $normalized['value'] ?? $position);
            $stepColor = (string) ($normalized['color'] ?? $this->color);

            $active = array_key_exists('active', $normalized)
                ? (bool) $normalized['active']
                : $this->isActive($position, $key);

            $this->steps[] = [
                'label' => (string) ($normalized['label'] ?? $normalized['title'] ?? $position),
                'icon' => $normalized['icon'] ?? null,
                'active' => $active,
                'classes' => $this->classes([
                    'step',
                    'step-primary' => $active && $stepColor === 'primary',
                    'step-secondary' => $active && $stepColor === 'secondary',
                    'step-accent' => $active && $stepColor === 'accent',
                    'step-neutral' => $active && $stepColor === 'neutral',
                    'step-info' => $active && $stepColor === 'info',
                    'step-success' => $active && $stepColor === 'success',
                    'step-warning' => $active && $stepColor === 'warning',
                    'step-error' => $active && $stepColor === 'error',
                ]),
            ];
        }
    }

    protected function componentData(array $data, ComponentAttributeBag $attributes): array
    {
        $steps = $this->steps;

        if ($this->truthy($attributes->get('unstyled'))) {
            $steps = array_map(static fn (array $step): array => [
                ...$step,
                'classes' => '',
            ], $steps);
        }

        return ['steps' => $steps];
    }

    protected function viewClasses(): array
    {
        return ['icon' => 'step-icon'];
    }

    protected function componentClasses(array $data, ComponentAttributeBag $attributes): array
    {
        return [
            'steps',
            'steps-vertical' => $this->vertical,
            'steps-horizontal' => ! $this->vertical,
        ];
    }

    private function isActive(int $position, string $key): bool
    {
        if ($this->current === null) {
            return false;
        }

        if (is_int($this->current) || ctype_digit((string) $this->current)) {
            return $position <= (int) $this->current;
        }

        return $key === (string) $this->current;
    }
}
