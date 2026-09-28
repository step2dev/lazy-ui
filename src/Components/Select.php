<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\Contracts\View\View;
use Step2dev\LazyUI\LazyComponent;

class Select extends LazyComponent
{
    public ?string $placeholder;

    public array $normalizedOptions = [];

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
        array $options = [],
        public string|int|float|null $value = null,
        public bool $multiple = false,
    ) {
        $this->placeholder = (string) str($placeholder ?: $this->label)->trim()->ucfirst();

        foreach ($options as $key => $option) {
            $normalized = is_array($option) ? $option : ['label' => $option];
            $optionValue = $normalized['value'] ?? (is_int($key) ? $option : $key);

            $this->normalizedOptions[] = [
                'value' => $optionValue,
                'label' => (string) ($normalized['label'] ?? $normalized['text'] ?? $optionValue),
                'disabled' => (bool) ($normalized['disabled'] ?? false),
                'selected' => array_key_exists('selected', $normalized)
                    ? (bool) $normalized['selected']
                    : (string) $optionValue === (string) $this->value,
            ];
        }
    }

    public function render(): \Closure|View
    {
        return function (array $data) {
            $attributes = $this->getAttributesFromData($data);
            $attributes['required'] = $this->required;

            if ($this->multiple) {
                $attributes['multiple'] = true;
            }

            $data['attributes'] = $attributes;
            $data['options'] = $this->normalizedOptions;

            $unstyled = $this->isTruthyAttribute($attributes, 'unstyled');
            $data['controlClass'] = $unstyled ? '' : 'w-full'.(($data['hasError'] ?? false) ? ' text-error select-error' : '');
            $data['hintClass'] = $unstyled ? '' : 'validator-hint';

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
