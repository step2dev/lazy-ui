<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\View\ComponentAttributeBag;

class TextRotate extends DaisyComponent
{
    protected const VIEW = 'lazy::text-rotate';

    public array $items;

    public function __construct(
        array $items = [],
        public ?int $duration = null,
    ) {
        $this->items = array_values(array_map(static fn ($item): string => (string) $item, $items));
    }

    protected function componentClasses(array $data, ComponentAttributeBag $attributes): array
    {
        return ['text-rotate'];
    }

    protected function componentData(array $data, ComponentAttributeBag $attributes): array
    {
        if ($this->duration !== null) {
            $attributes['style'] = trim(
                (string) $attributes->get('style', '').'; --duration: '.max(1, $this->duration).'ms;',
                '; '
            );
        }

        return ['attributes' => $attributes];
    }
}
