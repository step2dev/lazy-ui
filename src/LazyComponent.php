<?php

namespace Step2dev\LazyUI;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Arr;
use Illuminate\View\Component;
use Illuminate\View\ComponentAttributeBag;
use Illuminate\View\ComponentSlot;
use Step2dev\LazyUI\Traits\HasModels;

abstract class LazyComponent extends Component
{
    use HasModels;

    protected const DEFAULT = 'default';

    protected const DEFAULT_SIZES = [
        'xs',
        'sm',
        'md',
        'lg',
        'xl',
    ];

    protected const DEFAULT_COLORS = [
        'primary',
        'secondary',
        'accent',
        'neutral',
        'info',
        'success',
        'warning',
        'error',
    ];

    protected const DEFAULT_POSITIONS = [
        'vertical',
        'horizontal',
        'top',
        'bottom',
        'left',
        'right',
        'start',
        'end',
    ];

    public string $label = '';

    protected array $smartAttributes = [
        'outline',
        'shadow',
        'rounded',
    ];

    abstract public function render(): \Closure|View;

    public static function getName(): string
    {
        return class_basename(static::class);
    }

    protected function mergeClasses(ComponentAttributeBag $attributes, array $merge = []): ComponentAttributeBag
    {
        return $attributes->class($merge);
    }

    public function componentSlot(mixed $slot): ComponentSlot
    {
        return $slot instanceof ComponentSlot ? $slot : new ComponentSlot;
    }

    protected function mergeData(array $data, array $classes = [], array $exceptAttributes = []): array
    {
        $attributes = $this->getAttributesFromData($data);
        $unstyled = $this->isTruthyAttribute($attributes, 'unstyled');

        $data['unstyled'] = $unstyled;

        if (! $unstyled) {
            $attributes = $this->mergeClasses($attributes, $classes);
        }

        $attributes['disabled'] = (bool) $attributes->get('disabled');

        $data['attributes'] = $attributes->except([
            ...$this->smartAttributes,
            ...$exceptAttributes,
            'unstyled',
        ]);

        return $data;
    }

    protected function allowedSizes(): array
    {
        return static::DEFAULT_SIZES;
    }

    protected function allowedColors(): array
    {
        return static::DEFAULT_COLORS;
    }

    final protected function findBySmartAttribute(
        ComponentAttributeBag $attributes,
        array $keys,
        ?string $default = null
    ): ?string {
        foreach ($keys as $candidate) {
            if ($this->isTruthyAttribute($attributes, $candidate)) {
                $this->addSmartAttribute($candidate);

                return $candidate;
            }
        }

        return $default;
    }

    public function getSizeByAttribute(ComponentAttributeBag $attribute, ?string $default = null): ?string
    {
        return $this->getValueByKeyOrSmartAttribute($attribute, $this->allowedSizes(), 'size', $default);
    }

    final protected function getKeyByAttribute(
        ComponentAttributeBag $attribute,
        array $keys,
        ?string $key = null,
        ?string $default = null
    ): ?string {
        $value = $this->findBySmartAttribute($attribute, $keys);

        if ($value === null) {
            $value = $attribute->get($key, $default);

            if ($key !== null && $attribute->has($key)) {
                $this->addSmartAttribute($key);
            }
        }

        $value = strtolower((string) $value);

        return in_array($value, $keys, true) ? $value : $default;
    }

    public function getColorByAttribute(ComponentAttributeBag $attribute, ?string $default = null): ?string
    {
        return $this->getKeyByAttribute($attribute, $this->allowedColors(), 'color', $default);
    }

    public function classes(mixed $classes = []): string
    {
        return Arr::toCssClasses(Arr::wrap($classes));
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

    final protected function getValueByKeyOrSmartAttribute(
        ComponentAttributeBag $attributes,
        array $allowedValues,
        ?string $key = null,
        ?string $default = null
    ): ?string {
        $value = $this->findBySmartAttribute($attributes, $allowedValues);

        if ($value === null) {
            $value = $attributes->get($key, $default);

            if ($key !== null && $attributes->has($key)) {
                $this->addSmartAttribute($key);
            }
        }

        $value = strtolower((string) $value);

        if (in_array($value, $allowedValues, true)) {
            return $value;
        }

        return $default;
    }

    public function getPositionByAttribute(ComponentAttributeBag $attribute, ?string $default = null): ?string
    {
        return $this->getKeyByAttribute($attribute, $this->allowedPosition(), 'position', $default);
    }

    protected function allowedPosition(): array
    {
        return static::DEFAULT_POSITIONS;
    }

    private function isTruthyAttribute(ComponentAttributeBag $attributes, string $key): bool
    {
        if (! $attributes->has($key)) {
            return false;
        }

        $value = $attributes->get($key);

        return $value !== false && $value !== null && $value !== 'false' && $value !== '0' && $value !== 0;
    }
}
