@props([
    'size' => '',
    'unstyled' => false,
])

<div {{ $attributes->class([
    'dock' => ! $unstyled,
    'dock-xs' => ! $unstyled && $size === 'xs',
    'dock-sm' => ! $unstyled && $size === 'sm',
    'dock-md' => ! $unstyled && $size === 'md',
    'dock-lg' => ! $unstyled && $size === 'lg',
    'dock-xl' => ! $unstyled && $size === 'xl',
]) }}>
    {{ $slot }}
</div>
