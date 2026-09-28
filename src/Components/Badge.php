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

    protected function allowedColors(): array
    {
        return [
            ...parent::allowedColors(),
            'ghost',
            'danger',
        ];
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
                'badge-neutral' => $color === 'neutral',
                'badge-primary' => $color === 'primary',
                'badge-secondary' => $color === 'secondary',
                'badge-accent' => $color === 'accent',
                'badge-ghost' => $color === 'ghost',
                'badge-info' => $color === 'info',
                'badge-success' => $color === 'success',
                'badge-warning' => $color === 'warning',
                'badge-error' => in_array($color, ['error', 'danger'], true),
                'badge-xl' => $size === 'xl',
                'badge-lg' => $size === 'lg',
                'badge-md' => $size === 'md',
                'badge-sm' => $size === 'sm',
                'badge-xs' => $size === 'xs',
                'badge-outline' => $attributes->get('outline', false),
                'badge-dash' => $attributes->get('dash', false),
                'badge-soft' => $attributes->get('soft', false),
            ], [
                'outline',
                'dash',
                'soft',
            ]))->render();
        };
    }
}
