<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\View\ComponentAttributeBag;

class Range extends DaisyComponent
{
    protected const VIEW = 'lazy::range';

    public array $marks = [];

    public function __construct(
        public int|float $min = 0,
        public int|float $max = 100,
        public int|float|null $value = null,
        public int|float|null $step = null,
        public ?int $steps = null,
        public string $color = '',
        public string $size = '',
        public bool $vertical = false,
    ) {
        if ($this->steps !== null) {
            $this->steps = max(2, min(100, $this->steps));
            $this->step ??= ($this->max - $this->min) / ($this->steps - 1);
            $this->marks = array_fill(0, $this->steps, true);
        }

        $this->value ??= $this->min;
    }

    protected function componentClasses(array $data, ComponentAttributeBag $attributes): array
    {
        return [
            'range',
            'range-neutral' => $this->color === 'neutral',
            'range-primary' => $this->color === 'primary',
            'range-secondary' => $this->color === 'secondary',
            'range-accent' => $this->color === 'accent',
            'range-info' => $this->color === 'info',
            'range-success' => $this->color === 'success',
            'range-warning' => $this->color === 'warning',
            'range-error' => $this->color === 'error',
            'range-xl' => $this->size === 'xl',
            'range-lg' => $this->size === 'lg',
            'range-md' => $this->size === 'md',
            'range-sm' => $this->size === 'sm',
            'range-xs' => $this->size === 'xs',
            'range-vertical' => $this->vertical,
        ];
    }

    protected function prepareAttributes(ComponentAttributeBag $attributes): ComponentAttributeBag
    {
        $attributes['type'] = 'range';
        $attributes['min'] = $attributes->get('min', $this->min);
        $attributes['max'] = $attributes->get('max', $this->max);
        $attributes['value'] = $attributes->get('value', $this->value);

        if ($this->step !== null) {
            $attributes['step'] = $attributes->get('step', $this->step);
        }

        return $attributes;
    }
}
