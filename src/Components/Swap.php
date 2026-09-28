<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\View\ComponentAttributeBag;

class Swap extends DaisyComponent
{
    protected const VIEW = 'lazy::swap';

    public function __construct(
        public bool $active = false,
        public bool $rotate = false,
        public bool $flip = false,
        public string $name = '',
        public string $value = '1',
        public bool $checked = false,
        public bool $disabled = false,
        public mixed $onLabel = null,
        public mixed $offLabel = null,
        public mixed $indeterminateLabel = null,
    ) {}

    protected function viewClasses(): array
    {
        return [
            'on' => 'swap-on',
            'off' => 'swap-off',
            'indeterminate' => 'swap-indeterminate',
        ];
    }

    protected function componentClasses(array $data, ComponentAttributeBag $attributes): array
    {
        return [
            'swap',
            'swap-active' => $this->active,
            'swap-rotate' => $this->rotate,
            'swap-flip' => $this->flip,
        ];
    }

    protected function componentData(array $data, ComponentAttributeBag $attributes): array
    {
        return [
            'inputAttributes' => $attributes->only([
                'wire:model',
                'wire:model.live',
                'wire:model.blur',
                'wire:model.change',
                'wire:model.lazy',
                'form',
                'required',
            ]),
        ];
    }

    protected function consumedAttributes(): array
    {
        return [
            'wire:model',
            'wire:model.live',
            'wire:model.blur',
            'wire:model.change',
            'wire:model.lazy',
            'form',
            'required',
        ];
    }
}
