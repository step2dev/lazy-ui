<?php

namespace Step2dev\LazyUI\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Step2dev\LazyUI\LazyComponent;

class Divider extends LazyComponent
{
    public function render(): Closure|View
    {
        return function (array $data) {
            $attributes = $this->getAttributesFromData($data);

            $orientation = $attributes['orientation'] ?? $attributes['hr'] ?? 'vertical';
            unset($attributes['orientation'], $attributes['hr']);

            return view('lazy::divider', $this->mergeData($data, [
                'divider',
                'divider-horizontal' => in_array($orientation, ['horizontal', 'hr']),
            ]))->render();
        };
    }
}
