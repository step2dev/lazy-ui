<?php

namespace Step2dev\LazyUI\Components;

use Closure;
use Step2dev\LazyUI\LazyComponent;

class Tooltip extends LazyComponent
{
    public function render(): Closure
    {
        return function (array $data) {
            $attributes = $this->getAttributesFromData($data);
            $position = $this->getPositionByAttribute($attributes, 'top');
            $color = $this->getColorByAttribute($attributes);

            return view('lazy::tooltip', $this->mergeData($data, [
                'tooltip',
                'tooltip-open' => $attributes->get('open', false),
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
            ], [
                'open',
                'position',
                'color',
            ]))->render();
        };
    }
}
