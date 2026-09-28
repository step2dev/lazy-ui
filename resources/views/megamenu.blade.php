@props([
    'wide' => false,
    'full' => false,
    'vertical' => false,
    'size' => '',
    'unstyled' => false,
])

<div {{ $attributes->class([
    'megamenu' => ! $unstyled,
    'megamenu-wide' => ! $unstyled && $wide,
    'megamenu-full' => ! $unstyled && $full,
    'megamenu-vertical' => ! $unstyled && $vertical,
    'megamenu-xs' => ! $unstyled && $size === 'xs',
    'megamenu-sm' => ! $unstyled && $size === 'sm',
    'megamenu-md' => ! $unstyled && $size === 'md',
    'megamenu-lg' => ! $unstyled && $size === 'lg',
    'megamenu-xl' => ! $unstyled && $size === 'xl',
]) }}>
    @isset($active)
        <span @class(['megamenu-active' => ! $unstyled])>{{ $active }}</span>
    @endisset

    {{ $slot }}
</div>
