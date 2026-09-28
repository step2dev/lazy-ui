<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\View\ComponentAttributeBag;

class Textarea extends DaisyComponent
{
    protected const VIEW = 'lazy::textarea';

    public ?string $placeholder;

    public function __construct(
        string $placeholder = '',
        public bool $required = false,
        public bool $validator = false,
        public string $hint = '',
        public string $value = '',
        public string $color = '',
        public string $size = '',
    ) {
        $this->placeholder = (string) str($placeholder)->trim()->ucfirst();
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

        return $attributes;
    }

    protected function componentData(array $data, ComponentAttributeBag $attributes): array
    {
        $unstyled = $this->truthy($attributes->get('unstyled'));

        return [
            'controlClass' => $unstyled ? '' : 'w-full'.(($data['hasError'] ?? false) ? ' textarea-error' : ''),
            'hintClass' => $unstyled ? '' : 'validator-hint',
        ];
    }

    protected function componentClasses(array $data, ComponentAttributeBag $attributes): array
    {
        return [
            'textarea',
            'validator' => $this->validator,
            'textarea-ghost' => in_array($this->color, ['ghost', 'no-border'], true),
            'textarea-neutral' => $this->color === 'neutral',
            'textarea-primary' => $this->color === 'primary',
            'textarea-secondary' => $this->color === 'secondary',
            'textarea-accent' => $this->color === 'accent',
            'textarea-info' => $this->color === 'info',
            'textarea-success' => $this->color === 'success',
            'textarea-warning' => $this->color === 'warning',
            'textarea-error' => $this->color === 'error',
            'textarea-xl' => $this->size === 'xl',
            'textarea-lg' => $this->size === 'lg',
            'textarea-md' => $this->size === 'md',
            'textarea-sm' => $this->size === 'sm',
            'textarea-xs' => $this->size === 'xs',
        ];
    }
}
