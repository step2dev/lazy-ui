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
            $data['attributes'] = $attributes;

            return view('lazy::image', $this->mergeData($data))->render();
        };
    }
}
