<?php

namespace Step2dev\LazyUI\Traits;

use Illuminate\View\ComponentAttributeBag;

trait ResolvesFormFieldState
{
    protected function resolveFieldState(array $data, ComponentAttributeBag $attributes): array
    {
        $parameter = $attributes->wire('model')->value();
        $errors = $data['errors'] ?? null;

        return [
            'parameter' => $parameter,
            'hasError' => $parameter && $errors ? $errors->has($parameter) : false,
            'required' => (bool) $attributes->get('required', false),
        ];
    }
}
