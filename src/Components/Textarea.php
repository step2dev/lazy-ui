<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\Contracts\View\View;
use Step2dev\LazyUI\LazyComponent;

class Textarea extends LazyComponent
{
    public ?string $placeholder;

    public function __construct(string $placeholder = '', public bool $required = false)
    {
        $this->placeholder = (string) str($placeholder)->trim()->ucfirst();
    }

    public function render(): \Closure|View
    {
        return function (array $data) {
            $attributes = $this->getAttributesFromData($data);
            $attributes['required'] = $this->required;
            $data['attributes'] = $attributes;

            $color = $this->getColorByAttribute($attributes);
            $size = $this->getSizeByAttribute($attributes);

            return view('lazy::textarea', $this->mergeData($data, [
                'textarea',
                // colors
                'textarea-bordered' => ! $color || $color === 'bordered' || $color !== 'no-border',
                'textarea-ghost' => $color === 'ghost',
                'textarea-primary' => $color === 'primary',
                'textarea-secondary' => $color === 'secondary',
                'textarea-accent' => $color === 'accent',
                'textarea-info' => $color === 'info',
                'textarea-success' => $color === 'success',
                'textarea-warning' => $color === 'warning',
                'textarea-error' => $color === 'error',
                // sizes
                'textarea-lg' => $size === 'lg',
                'textarea-md' => $size === 'md',
                'textarea-sm' => $size === 'sm',
                'textarea-xs' => $size === 'xs',
            ]))->render();
        };
    }
}
