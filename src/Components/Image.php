<?php

namespace Lazyadm\LazyComponent\Components;

use Illuminate\Contracts\View\View;
use Lazyadm\LazyComponent\LazyComponent;

class Image extends LazyComponent
{
    protected ?string $src;
    protected ?string $alt;

    public function __construct(?string $src = '', ?string $alt = '')
    {
        $this->src = $src;
        $this->alt = $alt;

        $this->attributes->merge([
            'src' => $this->src,
            'alt' => $this->alt,
        ]);
    }

    public function render(): \Closure|View
    {
        return function (array $data) {
            return view('lazy::image', $this->mergeData($data))->render();
        };
    }
}
