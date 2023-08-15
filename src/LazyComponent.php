<?php

namespace Lazyadm\LazyComponent;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Arr;
use Illuminate\View\Component;
use Illuminate\View\ComponentAttributeBag;
use Illuminate\View\ComponentSlot;
use Lazyadm\LazyComponent\Traits\HasModels;

abstract class LazyComponent extends Component
{
    use HasModels;

    protected const DEFAULT = 'default';

    public string $label = '';

    protected array $smartAttributes = [
        'outline',
    ];

    abstract public function render(): \Closure|View;

    public static function getName(): string
    {
        return class_basename(static::class);
    }

    protected function mergeClasses(ComponentAttributeBag $attributes, array $merge = []): ComponentAttributeBag
    {
        return $attributes->class($this->classes($merge));
    }

    public function componentSlot(mixed $slot): ComponentSlot
    {
        if ($slot instanceof ComponentSlot) {
            return $slot;
        }

        return new ComponentSlot;
    }

    protected function mergeData(array $data, array $classes = [], array $exceptAttributes = []): array
    {
        $attributes = $this->mergeClasses($data['attributes'], $classes);

        $attributes['disabled'] = (bool) $attributes->get('disabled');
        $data['attributes'] = $attributes->except([
            ...$this->smartAttributes,
            ...$exceptAttributes,
        ]);

        return $data;
    }

    protected function allowedSizes(): array
    {
        return [
            'xs',
            'sm',
            'md',
            'lg',
            //            'xl',
            //            '2xl',
        ];
    }

    protected function allowedColors(): array
    {
        return [
            'primary',
            'secondary',
            'accent',
            'neutral',
            'info',
            'success',
            'warning',
            'error',
        ];
    }

    final protected function findBySmartAttribute(
        ComponentAttributeBag $attributes,
        array $keys,
        string $default = null
    ): ?string {
        $modifier = collect($attributes->only($keys)->getAttributes())->filter()->keys()->first();

        $this->addSmartAttribute($modifier);

        return $modifier ?? $default;
    }

    public function getSizeByAttribute(ComponentAttributeBag $attribute, string $default = null): ?string
    {
        return $this->getKeyByAttribute($attribute, $this->allowedSizes(), 'size', $default);
    }

    final protected function getKeyByAttribute(
        ComponentAttributeBag $attribute,
        array $keys,
        string $key = null,
        string $default = null
    ): ?string {
        $key = $this->findBySmartAttribute($attribute, $keys)
            ?? $attribute->get($key, $default);

        $key = strtolower($key);

        if (in_array($key, $keys, true)) {
            return $key;
        }

        return $default;
    }

    public function getColorByAttribute(ComponentAttributeBag $attribute, string $default = null): ?string
    {
        return $this->getKeyByAttribute($attribute, $this->allowedColors(), 'color', $default);
    }

    public function classes(mixed $classes = []): string
    {
        $classes = Arr::wrap($classes);

        return Arr::toCssClasses($classes);
    }

    public function getViewName(): string
    {
        return str(class_basename(static::class))->kebab();
    }

    final protected function addSmartAttribute(?string $attribute): void
    {
        if ($attribute && ! in_array($attribute, $this->smartAttributes, true)) {
            $this->smartAttributes[] = $attribute;
        }
    }

    final protected function getAttributesFromData(array $data): ComponentAttributeBag
    {
        return $data['attributes'] ?? new ComponentAttributeBag;
    }

    public function getPositionByAttribute(ComponentAttributeBag $attribute, string $default = null): ?string
    {
        return $this->getKeyByAttribute($attribute, $this->allowedPosition(), 'position', $default);
    }

    protected function allowedPosition(): array
    {
        return [
            'vertical',
            'horizontal',
            'top',
            'bottom',
            'left',
            'right',
            'start',
            'end',
        ];
    }
}
