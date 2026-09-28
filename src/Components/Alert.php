<?php

namespace Step2dev\LazyUI\Components;

use Closure;
use Illuminate\View\ComponentAttributeBag;
use Step2dev\LazyUI\LazyComponent;

class Alert extends LazyComponent
{
    protected function allowedColors(): array
    {
        return [
            ...parent::allowedColors(),
            'danger',
        ];
    }

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
            $data['type'] = $type;

            return view('lazy::alert', $this->mergeData($data, [
                'alert',
                'shadow-lg mt-1 mb-2',
                'alert-soft' => $attributes->get('soft', false),
                'alert-dash' => $attributes->get('dash', false),
                'alert-info' => $type === 'info',
                'alert-success' => $type === 'success',
                'alert-warning' => $type === 'warning',
                'alert-error' => in_array($type, ['error', 'danger'], true),
            ], [
                'type',
                'color',
                'soft',
                'dash',
            ]))->render();
        };
    }
}
