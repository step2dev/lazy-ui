<?php

namespace Lazyadm\LazyComponent\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Lazyadm\LazyComponent\LazyComponent;

class Form extends LazyComponent
{
    public function render(): View|Closure
    {
        return function (array $data) {
            $attributes = $data['attributes'] ?? [];
            $attributes['method'] = strtoupper($attributes['method'] ?? 'POST');

            $attributes['spoofMethod'] = in_array($attributes['method'], ['PUT', 'PATCH', 'DELETE']);
            $data['attributes'] = $attributes;

            return view('lazy::form.form', $this->mergeData($data))->render();
        };
    }
}
