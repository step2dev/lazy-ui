<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\View\ComponentAttributeBag;

class Otp extends DaisyComponent
{
    protected const VIEW = 'lazy::otp';

    public int $cellCount;

    public function __construct(
        public int $length = 6,
        public string $name = 'otp',
        public string $value = '',
        public bool $joined = false,
        public string $color = '',
        public string $size = '',
    ) {
        $this->cellCount = max(1, min(12, $this->length));
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
}
