<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\View\ComponentAttributeBag;

class Carousel extends DaisyComponent
{
    protected const VIEW = 'lazy::carousel';

    public array $items = [];

    public function __construct(
        public bool $vertical = false,
        public bool $center = false,
        public bool $end = false,
        array $items = [],
    ) {
        foreach (array_values($items) as $index => $item) {
            $normalized = is_array($item) ? $item : ['content' => $item];

            $this->items[] = [
                'id' => (string) ($normalized['id'] ?? 'slide-'.($index + 1)),
                'src' => $normalized['src'] ?? null,
                'alt' => (string) ($normalized['alt'] ?? ''),
                'content' => $normalized['content'] ?? null,
                'classes' => $this->classes([
                    'carousel-item',
                    (string) ($normalized['class'] ?? '') => isset($normalized['class']),
                ]),
            ];
        }
    }

    protected function componentData(array $data, ComponentAttributeBag $attributes): array
    {
        $items = $this->items;

        if ($this->truthy($attributes->get('unstyled'))) {
            $items = array_map(static fn (array $item): array => [
                ...$item,
                'classes' => '',
            ], $items);
        }

        return ['items' => $items];
    }

    protected function componentClasses(array $data, ComponentAttributeBag $attributes): array
    {
        return [
            'carousel',
            'carousel-vertical' => $this->vertical,
            'carousel-center' => $this->center,
            'carousel-end' => $this->end,
        ];
    }
}
