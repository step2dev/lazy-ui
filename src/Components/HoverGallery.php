<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\View\ComponentAttributeBag;

class HoverGallery extends DaisyComponent
{
    protected const VIEW = 'lazy::hover-gallery';

    public array $images = [];

    public function __construct(array $images = [])
    {
        foreach (array_values($images) as $image) {
            $normalized = is_array($image) ? $image : ['src' => $image];

            $this->images[] = [
                'src' => (string) ($normalized['src'] ?? ''),
                'alt' => (string) ($normalized['alt'] ?? ''),
                'classes' => (string) ($normalized['class'] ?? ''),
            ];
        }
    }

    protected function componentClasses(array $data, ComponentAttributeBag $attributes): array
    {
        return ['hover-gallery'];
    }
}
