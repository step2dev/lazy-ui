<?php

namespace Lazyadm\LazyComponent\Components;

use Closure;
use Lazyadm\LazyComponent\LazyComponent;

class Link extends LazyComponent
{
    public function __construct(public string $label = '') {}

    public function render(): Closure
    {
        return function (array $data) {
            $attributes = $this->getAttributesFromData($data);
            $color = $this->getColorByAttribute($attributes, '');

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
                'link-hover' => $color === 'hover',
            ]))->render();
        };
    }
}
