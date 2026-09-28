<?php

namespace Step2dev\LazyUI\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\ComponentAttributeBag;
use Step2dev\LazyUI\LazyComponent;

abstract class DaisyComponent extends LazyComponent
{
    protected const VIEW = '';

    public function render(): Closure|View
    {
        return function (array $data) {
            $attributes = $this->prepareAttributes($this->getAttributesFromData($data));
            $unstyled = $this->truthy($attributes->get('unstyled'));

            $data['unstyled'] = $unstyled;
            $data['attributes'] = $attributes
                ->except(['unstyled', ...$this->consumedAttributes()])
                ->class($unstyled ? [] : $this->componentClasses($data, $attributes));

            return view(static::VIEW, [
                ...$data,
                ...$this->componentData($data, $attributes),
            ])->render();
        };
    }

    protected function prepareAttributes(ComponentAttributeBag $attributes): ComponentAttributeBag
    {
        return $attributes;
    }

    protected function componentClasses(array $data, ComponentAttributeBag $attributes): array
    {
        return [];
    }

    protected function componentData(array $data, ComponentAttributeBag $attributes): array
    {
        return [];
    }

    protected function consumedAttributes(): array
    {
        return [];
    }

    protected function truthy(mixed $value): bool
    {
        return $value !== false && $value !== null && $value !== 'false' && $value !== '0' && $value !== 0;
    }
}
