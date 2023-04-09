<?php

namespace Lazyadm\LazyComponent;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
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

    protected array $smartAttributes = [
        'outline',
    ];

    abstract public function render(): \Closure|View;

    protected function findModifier(ComponentAttributeBag $attributes, array $modifiers): string
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
        $namespace = collect(explode('.', str_replace(['/', '\\'], '.', 'Lazyadm\\LazyComponent\\Components')))
            ->map([Str::class, 'kebab'])
            ->implode('.');

        $fullName = collect(explode('.', str_replace(['/', '\\'], '.', static::class)))
            ->map([Str::class, 'kebab'])
            ->implode('.');

        if (str($fullName)->startsWith($namespace)) {
            return (string) str($fullName)->substr(strlen($namespace) + 1);
        }

        return $fullName;
    }

    public function componentSlot(mixed $slot): ComponentSlot
    {
        if ($slot instanceof ComponentSlot) {
            return $slot;
        }

        return new ComponentSlot;
    }

    public function classes()
    {
        return Arr::toCssClasses([
            '',
        ]);

    }
}
