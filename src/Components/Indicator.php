<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\View\ComponentAttributeBag;

class Indicator extends DaisyComponent
{
    protected const VIEW = 'lazy::indicator';

    public function __construct(
        public mixed $indicator = null,
        public ?string $indicatorClass = null,
        public string $color = 'secondary',
        public ?string $size = null,
        public ?string $horizontal = null,
        public ?string $vertical = null,
    ) {}

    protected function componentClasses(array $data, ComponentAttributeBag $attributes): array
    {
        return ['indicator'];
    }

    protected function componentData(array $data, ComponentAttributeBag $attributes): array
    {
        $colors = [
            'neutral' => 'badge-neutral',
            'primary' => 'badge-primary',
            'secondary' => 'badge-secondary',
            'accent' => 'badge-accent',
            'info' => 'badge-info',
            'success' => 'badge-success',
            'warning' => 'badge-warning',
            'error' => 'badge-error',
        ];
        $sizes = [
            'xs' => 'badge-xs',
            'sm' => 'badge-sm',
            'md' => 'badge-md',
            'lg' => 'badge-lg',
            'xl' => 'badge-xl',
        ];
        $horizontalClasses = [
            'start' => 'indicator-start',
            'center' => 'indicator-center',
            'end' => 'indicator-end',
        ];
        $verticalClasses = [
            'top' => 'indicator-top',
            'middle' => 'indicator-middle',
            'bottom' => 'indicator-bottom',
        ];

        $color = $this->color;
        $size = $this->size;

        foreach (array_keys($colors) as $candidate) {
            if ($attributes->has($candidate)) {
                $color = $candidate;
                break;
            }
        }

        foreach (array_keys($sizes) as $candidate) {
            if ($attributes->has($candidate)) {
                $size = $candidate;
                break;
            }
        }

        $markerClasses = [
                'indicator-item',
                'badge' => ! $this->indicatorClass,
                $colors[$color] ?? $colors['secondary'] => ! $this->indicatorClass,
                $sizes[$size] ?? '' => ! $this->indicatorClass && $size,
                $horizontalClasses[$this->horizontal] ?? '' => (bool) $this->horizontal,
                $verticalClasses[$this->vertical] ?? '' => (bool) $this->vertical,
                $this->indicatorClass => filled($this->indicatorClass),
        ];

        if ($this->truthy($attributes->get('unstyled'))) {
            $markerClasses = [];
        }

        return ['markerClasses' => $markerClasses];
    }

    protected function consumedAttributes(): array
    {
        return [
            'neutral', 'primary', 'secondary', 'accent', 'info', 'success', 'warning', 'error',
            'xs', 'sm', 'md', 'lg', 'xl',
        ];
    }
}
