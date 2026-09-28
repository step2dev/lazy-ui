<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\View\ComponentAttributeBag;

class Card extends DaisyComponent
{
    protected const VIEW = 'lazy::card';

    public function __construct(
        public string $title = '',
        public bool $bordered = false,
        public bool $compact = false,
        public bool $side = false,
        public bool $imageFull = false,
    ) {}

    protected function viewClasses(): array
    {
        return [
            'body' => 'card-body',
            'title' => 'card-title',
            'actions' => 'card-actions justify-end',
        ];
    }

    protected function componentClasses(array $data, ComponentAttributeBag $attributes): array
    {
        return [
            'card',
            'card-border' => $this->bordered,
            'card-sm' => $this->compact,
            'card-side' => $this->side,
            'image-full' => $this->imageFull,
        ];
    }
}
