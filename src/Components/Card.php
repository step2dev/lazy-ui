<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\View\ComponentAttributeBag;

class Card extends DaisyComponent
{
    protected const VIEW = 'lazy::card';

    public string $tag;

    public function __construct(
        public string $title = '',
        public bool $bordered = false,
        public bool $compact = false,
        public bool $side = false,
        public bool $imageFull = false,
        public ?string $href = null,
        public bool $hover = false,
    ) {
        $this->tag = $this->href === null ? 'div' : 'a';
    }

    protected function prepareAttributes(ComponentAttributeBag $attributes): ComponentAttributeBag
    {
        if ($this->href !== null) {
            $attributes['href'] = $this->href;
        }

        return $attributes;
    }

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
            'transition hover:shadow-md' => $this->hover || $this->href !== null,
        ];
    }
}
