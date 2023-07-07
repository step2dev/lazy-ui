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

    protected array $colors = [
        self::DEFAULT => '',
    ];

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

        if (! in_array($modifier, $this->smartAttributes, true)) {
            $this->smartAttributes[] = $modifier;
        }

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

    final protected function size(ComponentAttributeBag $attributes): string
    {
        return $this->modifierClasses($attributes, $this->getSizes());
    }

    protected function modifierClasses(ComponentAttributeBag $attributes, array $modifiers): string
    {
        $modifier = $this->findModifier($attributes, $modifiers);

        return $modifiers[$modifier];
    }

    public function getSizes(): array
    {
        return $this->sizes;
    }

    protected function color(ComponentAttributeBag $attributes): string
    {
        return $this->modifierClasses($attributes, $this->currentColors());
    }

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

    protected function mergeData(array $data): array
    {
        $attributes = $this->mergeClasses($data['attributes']);

        $attributes['disabled'] = (bool) $attributes->get('disabled');
        $data['attributes'] = $attributes->except($this->smartAttributes);

        return $data;
    }

    public function classAttributes(): array
    {
        return [

        ];
    }

    public function classes(mixed $classes = []): string
    {
        $classes = Arr::wrap($classes);

        $classes =[
            ...$classes,
            $this->size($this->attributes),
            $this->color($this->attributes),
        ];

        $classes = array_filter(array_unique($classes));

        return Arr::toCssClasses($classes);
    }

    public function getViewName(): string
    {
        return str(class_basename(static::class))->kebab();
    }
}
