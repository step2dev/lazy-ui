@props([
    'drawerContent' => null,
    'id' => 'lazy-drawer',
    'open' => false,
    'end' => false,
    'menu' => true,
    'width' => 'md',
    'padding' => 'md',
    'background' => 'base-100',
    'unstyled' => false,
])

@php
    $widthClasses = [
        'xs' => 'w-56',
        'sm' => 'w-64',
        'md' => 'w-80',
        'lg' => 'w-96',
        'full' => 'w-full',
    ];

    $paddingClasses = [
        'none' => 'p-0',
        'xs' => 'p-1',
        'sm' => 'p-2',
        'md' => 'p-4',
        'lg' => 'p-6',
    ];

    $backgroundClasses = [
        'none' => '',
        'base-100' => 'bg-base-100',
        'base-200' => 'bg-base-200',
        'base-300' => 'bg-base-300',
        'neutral' => 'bg-neutral text-neutral-content',
        'primary' => 'bg-primary text-primary-content',
        'secondary' => 'bg-secondary text-secondary-content',
    ];

    $sideClasses = [
        'menu' => ! $unstyled && $menu,
        $widthClasses[$width] ?? $widthClasses['md'] => ! $unstyled,
        $paddingClasses[$padding] ?? $paddingClasses['md'] => ! $unstyled,
        $backgroundClasses[$background] ?? $backgroundClasses['base-100'] => ! $unstyled && ($backgroundClasses[$background] ?? $backgroundClasses['base-100']),
    ];
@endphp

<div {{ $attributes->class([
    'drawer' => ! $unstyled,
    'drawer-end' => ! $unstyled && $end,
]) }}>
    <input
        id="{{ $id }}"
        type="checkbox"
        @class(['drawer-toggle' => ! $unstyled])
        @checked($open)
    />

    <div @class(['drawer-content' => ! $unstyled])>
        {{ $slot }}
    </div>

    <div @class(['drawer-side' => ! $unstyled])>
        <label
            for="{{ $id }}"
            aria-label="Close sidebar"
            @class(['drawer-overlay' => ! $unstyled])
        ></label>

        @isset($side)
            <div {{ $side->attributes->class($sideClasses) }}>
                {{ $side }}
            </div>
        @else
            <div @class($sideClasses)>
                {{ $drawerContent }}
            </div>
        @endisset
    </div>
</div>
