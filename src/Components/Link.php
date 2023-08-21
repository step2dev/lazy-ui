<?php

namespace Step2dev\LazyUI\Components;

use Closure;
use Step2dev\LazyUI\LazyComponent;

class Link extends LazyComponent
{
    public function __construct(public string $label = '')
    {
    }

    public function render(): Closure
    {
        return function (array $data) {
            $attributes = $this->getAttributesFromData($data);
            $color = $this->getColorByAttribute($attributes, '');
            $hover = $attributes->get('hover', '');

            return view('lazy::link', $this->mergeData($data, [
                'link',
                'link-neutral' => $color === 'neutral',
                'link-primary' => $color === 'primary',
                'link-secondary' => $color === 'secondary',
                'link-accent' => $color === 'accent',
                'link-success' => $color === 'success',
                'link-info' => $color === 'info',
                'link-warning' => $color === 'warning',
                'link-error' => $color === 'error',
                'link-hover' => $hover,
            ]))->render();
        };
    }
}
