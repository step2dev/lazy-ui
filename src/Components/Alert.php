<?php

namespace Step2dev\LazyUI\Components;

use Closure;
use Illuminate\View\ComponentAttributeBag;
use Step2dev\LazyUI\LazyComponent;

class Alert extends LazyComponent
{
    public function getTypeByAttribute(ComponentAttributeBag $attribute, ?string $default = null): ?string
    {
        return $this->getKeyByAttribute($attribute, $this->allowedColors(), 'type', $default);
    }

    public function render(): Closure
    {
        return function (array $data) {
            $attributes = $this->getAttributesFromData($data);
            $attributes['disabled'] = (bool) $attributes->get('disabled');
            $type = $this->getTypeByAttribute($attributes) ?? $this->getColorByAttribute($attributes, 'default');

            $data['attributes'] = $attributes;

            return view('lazy::alert', $this->mergeData($data, [
                'alert',
                'shadow-lg mt-1 mb-2',
                'alert-info' => $type === 'info',
                'alert-success' => $type === 'success',
                'alert-warning' => $type === 'warning',
                'alert-error' => $type === 'error',
            ]))->render();
        };
    }
}
