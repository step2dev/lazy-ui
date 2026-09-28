@props([
    'color' => '',
    'size' => '',
    'unstyled' => false,
])

<span {{ $attributes->class([
    'status' => ! $unstyled,
    'status-neutral' => ! $unstyled && $color === 'neutral',
    'status-primary' => ! $unstyled && $color === 'primary',
    'status-secondary' => ! $unstyled && $color === 'secondary',
    'status-accent' => ! $unstyled && $color === 'accent',
    'status-info' => ! $unstyled && $color === 'info',
    'status-success' => ! $unstyled && $color === 'success',
    'status-warning' => ! $unstyled && $color === 'warning',
    'status-error' => ! $unstyled && $color === 'error',
    'status-xs' => ! $unstyled && $size === 'xs',
    'status-sm' => ! $unstyled && $size === 'sm',
    'status-md' => ! $unstyled && $size === 'md',
    'status-lg' => ! $unstyled && $size === 'lg',
    'status-xl' => ! $unstyled && $size === 'xl',
]) }}></span>
