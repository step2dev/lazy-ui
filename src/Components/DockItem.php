<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\View\ComponentAttributeBag;

class DockItem extends DaisyComponent
{
    protected const VIEW = 'lazy::dock-item';

    public function __construct(
        public ?string $href = null,
        public string $label = '',
        public bool $active = false,
    ) {}

    protected function viewClasses(): array
    {
        return ['label' => 'dock-label'];
    }

    protected function componentClasses(array $data, ComponentAttributeBag $attributes): array
    {
        return ['dock-active' => $this->active];
    }

    protected function componentData(array $data, ComponentAttributeBag $attributes): array
    {
        return ['tag' => $this->href ? 'a' : 'button'];
    }
}
