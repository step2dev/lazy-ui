<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\Contracts\View\View;
use Step2dev\LazyUI\LazyComponent;

class Textarea extends LazyComponent
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
        string $placeholder = '',
        public bool $required = false,
        public bool $validator = false,
        public string $hint = '',
    ) {
        $this->placeholder = (string) str($placeholder)->trim()->ucfirst();
    }

    public function render(): \Closure|View
    {
        return function (array $data) {
            $attributes = $this->getAttributesFromData($data);
            $attributes['required'] = $this->required;
            $data['attributes'] = $attributes;

            $unstyled = $this->isTruthyAttribute($attributes, 'unstyled');
            $data['controlClass'] = $unstyled ? '' : 'w-full'.(($data['hasError'] ?? false) ? ' textarea-error' : '');
            $data['hintClass'] = $unstyled ? '' : 'validator-hint';

            $color = $this->getColorByAttribute($attributes);
            $size = $this->getSizeByAttribute($attributes);

            return view('lazy::textarea', $this->mergeData($data, [
                'textarea',
                'validator' => $this->validator,
                'textarea-ghost' => $color === 'ghost' || $color === 'no-border',
                'textarea-neutral' => $color === 'neutral',
                'textarea-primary' => $color === 'primary',
                'textarea-secondary' => $color === 'secondary',
                'textarea-accent' => $color === 'accent',
                'textarea-info' => $color === 'info',
                'textarea-success' => $color === 'success',
                'textarea-warning' => $color === 'warning',
                'textarea-error' => $color === 'error',
                'textarea-xl' => $size === 'xl',
                'textarea-lg' => $size === 'lg',
                'textarea-md' => $size === 'md',
                'textarea-sm' => $size === 'sm',
                'textarea-xs' => $size === 'xs',
            ], [
                'color',
                'size',
            ]))->render();
        };
    }
}
