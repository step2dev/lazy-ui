<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\View\ComponentAttributeBag;

class Tooltip extends DaisyComponent
{
    protected const VIEW = 'lazy::tooltip';

    public function __construct(
        public string $tip = '',
        public bool $open = false,
        public ?string $position = null,
        public ?string $color = null,
    ) {}

    protected function componentClasses(array $data, ComponentAttributeBag $attributes): array
    {
        $position = $this->position ?: 'top';

        foreach (['top', 'right', 'bottom', 'left'] as $candidate) {
            if ($attributes->has($candidate)) {
                $position = $candidate;
                break;
            }
        }

        $color = $this->color;

        foreach (['primary', 'secondary', 'accent', 'info', 'success', 'warning', 'error'] as $candidate) {
            if ($attributes->has($candidate)) {
                $color = $candidate;
                break;
            }
        }

        return [
            'tooltip',
            'tooltip-open' => $this->open,
            'tooltip-top' => $position === 'top',
            'tooltip-right' => $position === 'right',
            'tooltip-bottom' => $position === 'bottom',
            'tooltip-left' => $position === 'left',
            'tooltip-primary' => $color === 'primary',
            'tooltip-secondary' => $color === 'secondary',
            'tooltip-accent' => $color === 'accent',
            'tooltip-info' => $color === 'info',
            'tooltip-success' => $color === 'success',
            'tooltip-warning' => $color === 'warning',
            'tooltip-error' => $color === 'error',
        ];
    }

    protected function consumedAttributes(): array
    {
        return ['top', 'right', 'bottom', 'left', 'primary', 'secondary', 'accent', 'info', 'success', 'warning', 'error'];
    }
}
