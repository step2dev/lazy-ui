<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\Contracts\View\View;
use Step2dev\LazyUI\LazyComponent;

class Select extends LazyComponent
{
    public ?string $placeholder;

    protected function allowedColors(): array
    {
        return [
            ...parent::allowedColors(),
            'no-border',
            'ghost',
        ];
    }

    public function __construct(
        public string $label = '',
        string $placeholder = '',
        public bool $required = false,
        public bool $validator = false,
        public string $hint = '',
    ) {
        $this->placeholder = (string) str($placeholder ?: $this->label)->trim()->ucfirst();
    }

    public function render(): \Closure|View
    {
        return function (array $data) {
            $attributes = $this->getAttributesFromData($data);
            $attributes['required'] = $this->required;
            $data['attributes'] = $attributes;

            $color = $this->getColorByAttribute($attributes);
            $size = $this->getSizeByAttribute($attributes);

            return view('lazy::select', $this->mergeData($data, [
                'select',
                'validator' => $this->validator,
                'select-ghost' => $color === 'ghost' || $color === 'no-border',
                'select-neutral' => $color === 'neutral',
                'select-primary' => $color === 'primary',
                'select-secondary' => $color === 'secondary',
                'select-accent' => $color === 'accent',
                'select-info' => $color === 'info',
                'select-success' => $color === 'success',
                'select-warning' => $color === 'warning',
                'select-error' => $color === 'error',
                'select-xl' => $size === 'xl',
                'select-lg' => $size === 'lg',
                'select-md' => $size === 'md',
                'select-sm' => $size === 'sm',
                'select-xs' => $size === 'xs',
            ], [
                'color',
                'size',
            ]))->render();
        };
    }
}
