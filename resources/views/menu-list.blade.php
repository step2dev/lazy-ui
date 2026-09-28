@props([
    'size' => '',
    'horizontal' => false,
    'paged' => false,
    'unstyled' => false,
])

<ul {{ $attributes->class([
    'menu' => ! $unstyled,
    'menu-vertical' => ! $unstyled && ! $horizontal,
    'menu-horizontal' => ! $unstyled && $horizontal,
    'menu-paged' => ! $unstyled && $paged,
    'menu-xs' => ! $unstyled && $size === 'xs',
    'menu-sm' => ! $unstyled && $size === 'sm',
    'menu-md' => ! $unstyled && $size === 'md',
    'menu-lg' => ! $unstyled && $size === 'lg',
    'menu-xl' => ! $unstyled && $size === 'xl',
]) }}>
    {{ $slot }}
</ul>
