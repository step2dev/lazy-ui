<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\View\ComponentAttributeBag;

class Select extends DaisyComponent
{
    protected const VIEW = 'lazy::select';

    public ?string $placeholder;

    public array $normalizedOptions = [];

    public function __construct(
        public string $label = '',
        string $placeholder = '',
        public bool $required = false,
        public bool $validator = false,
        public string $hint = '',
        array $options = [],
        public string|int|float|null $value = null,
        public bool $multiple = false,
        public string $color = '',
        public string $size = '',
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

    protected function allowedColors(): array
    {
        return [
            ...parent::allowedColors(),
            'no-border',
            'ghost',
        ];
    }

    protected function prepareAttributes(ComponentAttributeBag $attributes): ComponentAttributeBag
    {
        $attributes['required'] = $this->required;

        if ($this->multiple) {
            $attributes['multiple'] = true;
        }

        return $attributes;
    }

    protected function componentData(array $data, ComponentAttributeBag $attributes): array
    {
        $unstyled = $this->truthy($attributes->get('unstyled'));

        return [
            'options' => $this->normalizedOptions,
            'controlClass' => $unstyled ? '' : 'w-full'.(($data['hasError'] ?? false) ? ' text-error select-error' : ''),
            'hintClass' => $unstyled ? '' : 'validator-hint',
        ];
    }

    protected function componentClasses(array $data, ComponentAttributeBag $attributes): array
    {
        return [
            'select',
            'validator' => $this->validator,
            'select-ghost' => in_array($this->color, ['ghost', 'no-border'], true),
            'select-neutral' => $this->color === 'neutral',
            'select-primary' => $this->color === 'primary',
            'select-secondary' => $this->color === 'secondary',
            'select-accent' => $this->color === 'accent',
            'select-info' => $this->color === 'info',
            'select-success' => $this->color === 'success',
            'select-warning' => $this->color === 'warning',
            'select-error' => $this->color === 'error',
            'select-xl' => $this->size === 'xl',
            'select-lg' => $this->size === 'lg',
            'select-md' => $this->size === 'md',
            'select-sm' => $this->size === 'sm',
            'select-xs' => $this->size === 'xs',
        ];
    }
}
