<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\View\ComponentAttributeBag;

class Collapse extends DaisyComponent
{
    protected const VIEW = 'lazy::collapse';

    public function __construct(
        public string $title = '',
        public string $summaryClass = '',
        public string $contentClass = '',
        public bool $open = false,
        public bool $arrow = true,
        public bool $plus = false,
    ) {}

    protected function viewClasses(): array
    {
        return [
            'title' => $this->classes([
                'collapse-title',
                $this->summaryClass => $this->summaryClass !== '',
            ]),
            'content' => $this->classes([
                'collapse-content',
                $this->contentClass => $this->contentClass !== '',
            ]),
        ];
    }

    protected function componentClasses(array $data, ComponentAttributeBag $attributes): array
    {
        return [
            'collapse',
            'collapse-arrow' => $this->arrow && ! $this->plus,
            'collapse-plus' => $this->plus,
        ];
    }
}
