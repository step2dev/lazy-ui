<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\Contracts\View\View;

class Toggle extends Checkbox
{
    public function render(): \Closure|View
    {
        return function (array $data) {
            $attributes = $this->getAttributesFromData($data);
            $attributes['type'] = 'checkbox';
            $data['attributes'] = $attributes;

            $color = $this->getColorByAttribute($attributes);
            $size = $this->getSizeByAttribute($attributes);

            return view('lazy::toggle', $this->mergeData($data, [
                'toggle',
                'toggle-neutral' => $color === 'neutral',
                'toggle-primary' => $color === 'primary',
                'toggle-secondary' => $color === 'secondary',
                'toggle-accent' => $color === 'accent',
                'toggle-info' => $color === 'info',
                'toggle-success' => $color === 'success',
                'toggle-warning' => $color === 'warning',
                'toggle-error' => $color === 'error',
                'toggle-xl' => $size === 'xl',
                'toggle-lg' => $size === 'lg',
                'toggle-md' => $size === 'md',
                'toggle-sm' => $size === 'sm',
                'toggle-xs' => $size === 'xs',
            ], [
                'color',
                'size',
            ]))->render();
        };
    }
}
