<?php

namespace Lazyadm\LazyComponent\Components;

use Illuminate\Contracts\View\View;
use Lazyadm\LazyComponent\LazyComponent;

class Image extends LazyComponent
{
    public function __construct(
        protected ?string $src = '',
        protected ?string $alt = ''
    ) {
    }

    public function render(): \Closure|View
    {
        return function (array $data) {
            $attributes = $this->getAttributesFromData($data);
            $attributes = $attributes->merge([
                'src' => $this->src,
                'alt' => $this->alt,
            ]);

            $mask = $attributes['mask'] ?? null;

            $attributes = $this->mergeClasses($attributes);
            $data['attributes'] = $attributes;

            return view('lazy::image', $this->mergeData($data, [
                'mask' => $mask,
                'mask-squircle' => $mask === 'squircle',
                'mask-heart' => $mask === 'heart',
                'mask-hexagon' => $mask === 'hexagon',
                'mask-hexagon-2' => $mask === 'hexagon-2',
                'mask-decagon' => $mask === 'decagon',
                'mask-pentagon' => $mask === 'pentagon',
                'mask-diamond' => $mask === 'diamond',
                'mask-square' => $mask === 'square',
                'mask-circle' => $mask === 'circle',
                'mask-parallelogram' => $mask === 'parallelogram',
                'mask-parallelogram-2' => $mask === 'parallelogram-2',
                'mask-parallelogram-3' => $mask === 'parallelogram-3',
                'mask-parallelogram-4' => $mask === 'parallelogram-4',
                'mask-star' => $mask === 'star',
                'mask-star-2' => $mask === 'star-2',
                'mask-triangle' => $mask === 'triangle',
                'mask-triangle-2' => $mask === 'triangle-2',
                'mask-triangle-3' => $mask === 'triangle-3',
                'mask-triangle-4' => $mask === 'triangle-4',
                'mask-half-1' => false,
                'mask-half-2' => false,
            ]))->render();
        };
    }
}
