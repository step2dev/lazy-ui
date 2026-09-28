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
            $smartAttributes = $this->syncCommonSmartAttributes($attributes);
            $unstyled = $this->truthy($attributes->get('unstyled'));

            $data['unstyled'] = $unstyled;
            $data['attributes'] = $attributes
                ->except(['unstyled', ...$smartAttributes, ...$this->consumedAttributes()])
                ->class($unstyled ? [] : $this->componentClasses($data, $attributes));

            return view(static::VIEW, [
                ...$data,
                'viewClasses' => $this->resolvedViewClasses($unstyled),
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

    protected function viewClasses(): array
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

    private function resolvedViewClasses(bool $unstyled): array
    {
        $classes = [];

        foreach ($this->viewClasses() as $key => $value) {
            $classes[$key] = $unstyled ? '' : $this->classes($value);
        }

        return $classes;
    }

    private function syncCommonSmartAttributes(ComponentAttributeBag $attributes): array
    {
        $consumed = [];

        if (property_exists($this, 'color')) {
            foreach ($this->allowedColors() as $color) {
                if ($attributes->has($color) && $this->truthy($attributes->get($color))) {
                    $this->color = $color;
                    $consumed[] = $color;
                    break;
                }
            }
        }

        if (property_exists($this, 'size')) {
            foreach ($this->allowedSizes() as $size) {
                if ($attributes->has($size) && $this->truthy($attributes->get($size))) {
                    $this->size = $size;
                    $consumed[] = $size;
                    break;
                }
            }
        }

        return $consumed;
    }
}
