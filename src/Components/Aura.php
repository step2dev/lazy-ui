<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\View\ComponentAttributeBag;

class Aura extends DaisyComponent
{
    protected const VIEW = 'lazy::aura';

    public function __construct(
        public string $type = '',
        public string $size = '',
        public bool $glow = false,
    ) {}

    protected function componentClasses(array $data, ComponentAttributeBag $attributes): array
    {
        return [
            'aura',
            'aura-dual' => $this->type === 'dual',
            'aura-rainbow' => $this->type === 'rainbow',
            'aura-holo' => $this->type === 'holo',
            'aura-gold' => $this->type === 'gold',
            'aura-silver' => $this->type === 'silver',
            'aura-glow' => $this->glow,
            'aura-xs' => $this->size === 'xs',
            'aura-sm' => $this->size === 'sm',
            'aura-md' => $this->size === 'md',
            'aura-lg' => $this->size === 'lg',
            'aura-xl' => $this->size === 'xl',
        ];
    }
}
