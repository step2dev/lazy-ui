<?php

namespace Lazyadm\LazyComponent\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\ComponentAttributeBag;
use Lazyadm\LazyComponent\LazyComponent;

class Loading extends LazyComponent
{
    public function getTypeByAttribute(ComponentAttributeBag $attribute, string|null $default = null): string
    {
        return $this->getKeyByAttribute($attribute, $this->allowedTypes(), 'type', $default);
    }

    public function mergeData(array $data, array $classes = [], array $exceptAttributes = []): array
    {
        $attributes = $data['attributes'];

        $size = $this->getSizeByAttribute($attributes, 'md');
        $type = $this->getTypeByAttribute($attributes, 'spinner');

        $classes = [
            ...$classes,
            ...[
                'loading',
                'loading-xs' => $size === 'xs',
                'loading-sm' => $size === 'sm',
                'loading-md' => $size === 'md',
                'loading-lg' => $size === 'lg',
                'loading-spinner' => $type === 'spinner',
                'loading-dots' => $type === 'dots',
                'loading-ring' => $type === 'ring',
                'loading-ball' => $type === 'ball',
                'loading-bars' => $type === 'bars',
                'loading-infinity' => $type === 'infinity',
                'text-primary' => $attributes->get('primary', false),
                'text-secondary' => $attributes->get('secondary', false),
                'text-accent' => $attributes->get('accent', false),
                'text-neutral' => $attributes->get('neutral', false),
                'text-info' => $attributes->get('info', false),
                'text-success' => $attributes->get('success', false),
                'text-warning' => $attributes->get('warning', false),
                'text-error' => $attributes->get('error', false),
            ],
        ];

        return parent::mergeData($data, $classes);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): Closure|View
    {
        return function (array $data) {
            return view('lazy::loading', $this->mergeData($data))->render();
        };
    }

    private function allowedTypes(): array
    {
        return [
            'spinner',
            'dots',
            'ring',
            'ball',
            'bars',
            'infinity',
        ];
    }
}
