<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\Contracts\View\View;
use Step2dev\LazyUI\LazyComponent;

class Input extends LazyComponent
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

            return view('lazy::input', $this->mergeData($data, [
                'input',
                'validator' => $this->validator,
                'input-ghost' => $color === 'ghost' || $color === 'no-border',
                'input-neutral' => $color === 'neutral',
                'input-primary' => $color === 'primary',
                'input-secondary' => $color === 'secondary',
                'input-accent' => $color === 'accent',
                'input-info' => $color === 'info',
                'input-success' => $color === 'success',
                'input-warning' => $color === 'warning',
                'input-error' => $color === 'error',
                'input-xl' => $size === 'xl',
                'input-lg' => $size === 'lg',
                'input-md' => $size === 'md',
                'input-sm' => $size === 'sm',
                'input-xs' => $size === 'xs',
            ], [
                'color',
                'size',
            ]))->render();
        };
    }
}
