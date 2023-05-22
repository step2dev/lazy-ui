<?php

namespace Lazyadm\LazyComponent\Components;

use Closure;
use Illuminate\View\ComponentAttributeBag;
use Lazyadm\LazyComponent\LazyComponent;

class Tooltip extends LazyComponent
{
    protected array $colors = [
        'default' => '',
        'primary' => 'tooltip-primary',
        'secondary' => 'tooltip-secondary',
        'accent' => 'tooltip-accent',
        'info' => 'tooltip-info',
        'success' => 'tooltip-success',
        'warning' => 'tooltip-warning',
        'error' => 'tooltip-error',
    ];

    protected array $positions = [
        'top' => 'tooltip-top',
        'right' => 'tooltip-right',
        'bottom' => 'tooltip-bottom',
        'left' => 'tooltip-left',
    ];

    protected bool  $open = false;

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): Closure
    {
        return function (array $data) {
            $this->open = $data['attributes']['open'] ?? false;
            $data['attributes']['class'] = $this->open ? 'tooltip-open' : '';

            return view('lazy::tooltip', $this->mergeData($data))->render();
        };
    }

    protected function mergeClasses(ComponentAttributeBag $attributes, array $merge = []): ComponentAttributeBag
    {
        return $attributes->class(array_filter([
            ...$merge,
            $this->position($attributes),
            $this->color($attributes),
        ]));
    }

    final protected function position(ComponentAttributeBag $attributes): string
    {
        return $this->modifierClasses($attributes, $this->positions);
    }
}
