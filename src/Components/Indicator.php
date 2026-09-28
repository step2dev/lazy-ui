<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\View\ComponentAttributeBag;

class Indicator extends DaisyComponent
{
    protected const VIEW = 'lazy::indicator';

    public array $markerClasses;

    public function __construct(
        public mixed $indicator = null,
        public ?string $indicatorClass = null,
        public string $color = 'secondary',
        public ?string $size = null,
        public ?string $horizontal = null,
        public ?string $vertical = null,
    ) {
        $colors = [
            'neutral' => 'badge-neutral', 'primary' => 'badge-primary', 'secondary' => 'badge-secondary',
            'accent' => 'badge-accent', 'info' => 'badge-info', 'success' => 'badge-success',
            'warning' => 'badge-warning', 'error' => 'badge-error',
        ];
        $sizes = ['xs' => 'badge-xs', 'sm' => 'badge-sm', 'md' => 'badge-md', 'lg' => 'badge-lg', 'xl' => 'badge-xl'];
        $h = ['start' => 'indicator-start', 'center' => 'indicator-center', 'end' => 'indicator-end'];
        $v = ['top' => 'indicator-top', 'middle' => 'indicator-middle', 'bottom' => 'indicator-bottom'];

        $this->markerClasses = [
            'indicator-item',
            'badge' => ! $this->indicatorClass,
            $colors[$this->color] ?? $colors['secondary'] => ! $this->indicatorClass,
            $sizes[$this->size] ?? '' => ! $this->indicatorClass && $this->size,
            $h[$this->horizontal] ?? '' => (bool) $this->horizontal,
            $v[$this->vertical] ?? '' => (bool) $this->vertical,
            $this->indicatorClass => filled($this->indicatorClass),
        ];
    }

    protected function componentClasses(array $data, ComponentAttributeBag $attributes): array
    {
        return ['indicator'];
    }
}
