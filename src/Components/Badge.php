<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\Contracts\View\View;
use Step2dev\LazyUI\LazyComponent;

class Badge extends LazyComponent
{
    public function __construct(?string $label = '')
    {
        $this->label = $label;
    }

    public function allowedPosition(): array
    {
        return [
            'vertical',
            'horizontal',
        ];
    }

    public function render(): \Closure|View
    {
        return function (array $data) {
            $attributes = $this->getAttributesFromData($data);

            $color = $this->getColorByAttribute($attributes);
            $size = $this->getSizeByAttribute($attributes);

            return view('lazy::badge', $this->mergeData($data, [
                'badge',
                'badge-primary' => $color === 'primary',
                'badge-secondary' => $color === 'secondary',
                'badge-accent' => $color === 'accent',
                'badge-ghost' => $color === 'ghost',
                'badge-info' => $color === 'info',
                'badge-success' => $color === 'success',
                'badge-warning' => $color === 'warning',
                'badge-error' => $color === 'error',
                'badge-danger' => $color === 'danger',
                // sizes
                'badge-lg' => $size === 'lg',
                'badge-md' => $size === 'md',
                'badge-sm' => $size === 'sm',
                'badge-xs' => $size === 'xs',
                // other
                'badge-outline' => $attributes->get('outline'),
            ]))->render();
        };
    }
}
