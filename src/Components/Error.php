<?php

namespace Step2dev\LazyUI\Components;

use Closure;
use Step2dev\LazyUI\LazyComponent;

class Error extends LazyComponent
{
    public function render(): Closure
    {
        return function (array $data) {
            $attributes = $this->getAttributesFromData($data);
            $attributes['key'] ??= $attributes['param'] ?? $attributes['name'] ?? null;
            $data['attributes'] = $attributes;

            return view('lazy::error', $this->mergeData($data))->render();
        };
    }
}
