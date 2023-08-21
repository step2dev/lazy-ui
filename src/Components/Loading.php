<?php

namespace Step2dev\LazyUI\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\ComponentAttributeBag;
use Step2dev\LazyUI\LazyComponent;

class Loading extends LazyComponent
{
    public function getTypeByAttribute(ComponentAttributeBag $attribute, string $default = null): string
    {
        return $this->getKeyByAttribute($attribute, $this->allowedTypes(), 'type', $default);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): Closure|View
    {
        return function (array $data) {
            $attributes = $this->getAttributesFromData($data);
            $size = $this->getSizeByAttribute($attributes, 'md');
            $type = $this->getTypeByAttribute($attributes, 'spinner');
            $color = $this->getColorByAttribute($attributes, '');

            return view('lazy::loading', $this->mergeData($data, [
                'loading',
                'loading-xs' => $size === 'xs',
                'loading-sm' => $size === 'sm',
                'loading-md' => $size === 'md',
                'loading-lg' => $size === 'lg',
                'loading-spinner' => $type === 'spinner',
                'loading-dots' => $type === 'dots',
                'loading-ring' => $type === 'ring',
                'loading-ball' => $type === 'ball',
                'loading-bars' => $type === 'bars',
                'loading-infinity' => $type === 'infinity',
                'text-primary' => $color === 'primary',
                'text-secondary' => $color === 'secondary',
                'text-accent' => $color === 'accent',
                'text-neutral' => $color === 'neutral',
                'text-info' => $color === 'info',
                'text-success' => $color === 'success',
                'text-warning' => $color === 'warning',
                'text-error' => $color === 'error',
            ], [
                'type',
                'size',
                'color',
            ]))->render();
        };
    }

    private function allowedTypes(): array
    {
        return [
            'spinner',
            'dots',
            'ring',
            'ball',
            'bars',
            'infinity',
        ];
    }
}
