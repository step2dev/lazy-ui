<?php

namespace Lazyadm\LazyComponent\Components;

use Closure;
use Illuminate\View\ComponentAttributeBag;
use Lazyadm\LazyComponent\LazyComponent;

class Alert extends LazyComponent
{
    protected array $colors = [
        'default' => '',
        'info' => 'alert-info',
        'success' => 'alert-success',
        'warning' => 'alert-warning',
        'danger' => 'alert-error',
        'error' => 'alert-error',
    ];

    public function getTypeByAttribute(ComponentAttributeBag $attribute, string $default = null): ?string
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
