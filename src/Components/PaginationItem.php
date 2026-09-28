<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\View\ComponentAttributeBag;

class PaginationItem extends DaisyComponent
{
    protected const VIEW = 'lazy::pagination-item';

    public function __construct(
        public ?string $href = null,
        public bool $active = false,
        public bool $disabled = false,
    ) {}

    protected function componentClasses(array $data, ComponentAttributeBag $attributes): array
    {
        return [
            'join-item btn',
            'btn-active' => $this->active,
        ];
    }

    protected function componentData(array $data, ComponentAttributeBag $attributes): array
    {
        return ['tag' => $this->href && ! $this->disabled ? 'a' : 'button'];
    }
}
