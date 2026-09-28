@props([
    'drawerContent' => null,
    'id' => 'lazy-drawer',
    'open' => false,
    'end' => false,
    'unstyled' => false,
])

<div {{ $attributes->class([
    'drawer' => ! $unstyled,
    'drawer-end' => ! $unstyled && $end,
]) }}>
    <input id="{{ $id }}" type="checkbox" @class(['drawer-toggle' => ! $unstyled]) @checked($open) />

    <div @class(['drawer-content' => ! $unstyled])>
        {{ $slot }}
    </div>

    <div @class(['drawer-side' => ! $unstyled])>
        <label for="{{ $id }}" aria-label="Close sidebar" @class(['drawer-overlay' => ! $unstyled])></label>
        <div @class(['bg-base-100 min-h-full w-80 p-4' => ! $unstyled])>
            {{ $side ?? $drawerContent }}
        </div>
    </div>
</div>
