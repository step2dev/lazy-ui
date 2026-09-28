<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\View\ComponentAttributeBag;

class Mask extends DaisyComponent
{
    protected const VIEW = 'lazy::mask';

    public function __construct(public string $shape = 'squircle') {}

    protected function componentClasses(array $data, ComponentAttributeBag $attributes): array
    {
        return [
            'mask',
            'mask-squircle' => $this->shape === 'squircle',
            'mask-heart' => $this->shape === 'heart',
            'mask-hexagon' => $this->shape === 'hexagon',
            'mask-hexagon-2' => $this->shape === 'hexagon-2',
            'mask-decagon' => $this->shape === 'decagon',
            'mask-pentagon' => $this->shape === 'pentagon',
            'mask-diamond' => $this->shape === 'diamond',
            'mask-circle' => $this->shape === 'circle',
            'mask-star' => $this->shape === 'star',
            'mask-star-2' => $this->shape === 'star-2',
            'mask-triangle' => $this->shape === 'triangle',
            'mask-triangle-2' => $this->shape === 'triangle-2',
            'mask-triangle-3' => $this->shape === 'triangle-3',
            'mask-triangle-4' => $this->shape === 'triangle-4',
            'mask-square' => $this->shape === 'square',
            'mask-parallelogram' => $this->shape === 'parallelogram',
            'mask-parallelogram-2' => $this->shape === 'parallelogram-2',
            'mask-parallelogram-3' => $this->shape === 'parallelogram-3',
            'mask-parallelogram-4' => $this->shape === 'parallelogram-4',
        ];
    }
}
