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

    /**
     * @deprecated
     */
    protected const DEFAULT = 'default';

    public string $label = '';

    /**
     * @deprecated
     */
    protected array $colors = [
        self::DEFAULT => '',
    ];

    /**
     * @deprecated
     */
    protected array $sizes = [
        self::DEFAULT => '',
    ];

    protected array $positions = [
        self::DEFAULT => '',
    ];

    protected array $smartAttributes = [
        'outline',
    ];

    abstract public function render(): \Closure|View;

    final protected function findModifier(ComponentAttributeBag $attributes, array $modifiers): string
    {
        $keys = collect($modifiers)->keys()->except(self::DEFAULT)->toArray();

        $modifiers = $attributes->only($keys)->getAttributes();

        $modifier = collect($modifiers)->filter()->keys()->first();

        $this->addSmartAttribute($modifier);

        return $modifier ?? self::DEFAULT;
    }

    public static function getName(): string
    {
        return class_basename(static::class);
    }

    protected function mergeClasses(ComponentAttributeBag $attributes, array $merge = []): ComponentAttributeBag
    {
        return $attributes->class($this->classes($merge));
    }

    /**
     * @deprecated
     */
    final protected function size(ComponentAttributeBag $attributes): string
    {
        return $this->modifierClasses($attributes, $this->getSizes());
    }

    protected function modifierClasses(ComponentAttributeBag $attributes, array $modifiers): string
    {
        $modifier = $this->findModifier($attributes, $modifiers);

        return $modifiers[$modifier];
    }

    /**
     * @deprecated
     */
    public function getSizes(): array
    {
        return $this->sizes;
    }

    /**
     * @deprecated
     */
    protected function color(ComponentAttributeBag $attributes): string
    {
        return $this->modifierClasses($attributes, $this->currentColors());
    }

    /**
     * @deprecated
     */
    protected function currentColors(): array
    {
        return $this->colors;
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

    public function allowedSizes(): array
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

    public function allowedColors(): array
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

        $classes = [
            ...$classes,
            $this->size($this->attributes),
            $this->color($this->attributes),
        ];

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
}
