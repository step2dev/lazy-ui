<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\View\ComponentAttributeBag;

class Input extends DaisyComponent
{
    protected const VIEW = 'lazy::input';

    public ?string $placeholder;

    public function __construct(
        public string $label = '',
        string $placeholder = '',
        public bool $required = false,
        public bool $validator = false,
        public string $hint = '',
        public string $color = '',
        public string $size = '',
    ) {
        $this->placeholder = (string) str($placeholder ?: $this->label)->trim()->ucfirst();
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
            'controlClass' => $unstyled ? '' : 'w-full'.(($data['hasError'] ?? false) ? ' text-error input-error' : ''),
            'hintClass' => $unstyled ? '' : 'validator-hint',
        ];
    }

    protected function componentClasses(array $data, ComponentAttributeBag $attributes): array
    {
        return [
            'input',
            'validator' => $this->validator,
            'input-ghost' => in_array($this->color, ['ghost', 'no-border'], true),
            'input-neutral' => $this->color === 'neutral',
            'input-primary' => $this->color === 'primary',
            'input-secondary' => $this->color === 'secondary',
            'input-accent' => $this->color === 'accent',
            'input-info' => $this->color === 'info',
            'input-success' => $this->color === 'success',
            'input-warning' => $this->color === 'warning',
            'input-error' => $this->color === 'error',
            'input-xl' => $this->size === 'xl',
            'input-lg' => $this->size === 'lg',
            'input-md' => $this->size === 'md',
            'input-sm' => $this->size === 'sm',
            'input-xs' => $this->size === 'xs',
        ];
    }
}
