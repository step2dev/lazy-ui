<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\View\ComponentAttributeBag;

class Breadcrumbs extends DaisyComponent
{
    protected const VIEW = 'lazy::breadcrumbs';

    public array $items = [];

    public function __construct(array $items = [])
    {
        foreach (array_values($items) as $index => $item) {
            $normalized = is_array($item) ? $item : ['label' => $item];

            $this->items[] = [
                'label' => (string) ($normalized['label'] ?? $normalized['title'] ?? ''),
                'href' => $normalized['href'] ?? $normalized['url'] ?? null,
                'current' => (bool) ($normalized['current'] ?? $index === count($items) - 1),
            ];
        }
    }

    protected function componentClasses(array $data, ComponentAttributeBag $attributes): array
    {
        return ['breadcrumbs', 'text-sm'];
    }
}
