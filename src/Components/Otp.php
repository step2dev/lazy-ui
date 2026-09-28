<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\View\ComponentAttributeBag;

class Otp extends DaisyComponent
{
    protected const VIEW = 'lazy::otp';

    public array $cells = [];

    public function __construct(
        public int $length = 6,
        public string $name = 'otp',
        public string $value = '',
        public bool $joined = false,
        public string $color = '',
        public string $size = '',
        public bool $numeric = true,
        public bool $readonly = false,
    ) {
        $count = max(1, min(12, $this->length));
        $this->length = $count;
        $this->cells = array_fill(0, $count, true);
    }

    protected function componentClasses(array $data, ComponentAttributeBag $attributes): array
    {
        return [
            'otp',
            'otp-joined' => $this->joined,
            'otp-neutral' => $this->color === 'neutral',
            'otp-primary' => $this->color === 'primary',
            'otp-secondary' => $this->color === 'secondary',
            'otp-accent' => $this->color === 'accent',
            'otp-success' => $this->color === 'success',
            'otp-info' => $this->color === 'info',
            'otp-warning' => $this->color === 'warning',
            'otp-error' => $this->color === 'error',
            'otp-xs' => $this->size === 'xs',
            'otp-sm' => $this->size === 'sm',
            'otp-md' => $this->size === 'md',
            'otp-lg' => $this->size === 'lg',
            'otp-xl' => $this->size === 'xl',
        ];
    }

    protected function componentData(array $data, ComponentAttributeBag $attributes): array
    {
        $inputAttributes = $attributes->only([
            'wire:model',
            'wire:model.live',
            'wire:model.blur',
            'wire:model.change',
            'wire:model.lazy',
            'disabled',
            'required',
            'form',
        ]);

        return [
            'inputAttributes' => $inputAttributes,
            'inputMode' => $this->numeric ? 'numeric' : 'text',
            'pattern' => $this->numeric ? '[0-9]*' : null,
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
            'disabled',
            'required',
            'form',
        ];
    }
}
