<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\View\ComponentAttributeBag;

class Tab extends DaisyComponent
{
    protected const VIEW = 'lazy::tab';

    public function __construct(
        public string $label = '',
        public bool $active = false,
        public bool $disabled = false,
        public string $size = '',
    ) {}

    protected function prepareAttributes(ComponentAttributeBag $attributes): ComponentAttributeBag
    {
        if ($this->disabled) {
            $attributes['aria-disabled'] = 'true';
            $attributes['tabindex'] = '-1';
        }

        return $attributes;
    }

    protected function componentData(array $data, ComponentAttributeBag $attributes): array
    {
        return [
            'label' => $this->label ?: (string) $attributes->get('title', ''),
        ];
    }

    protected function componentClasses(array $data, ComponentAttributeBag $attributes): array
    {
        return [
            'tab',
            'tab-active' => $this->active,
            'tab-disabled' => $this->disabled,
        ];
    }

    protected function consumedAttributes(): array
    {
        return ['title'];
    }
}
