@props([
    'color' => '',
    'size' => '',
    'ghost' => false,
    'unstyled' => false,
])

@aware([
    'join' => false,
])

<input
    type="file"
    {{ $attributes->class([
        'file-input' => ! $unstyled,
        'join-item' => ! $unstyled && $join,
        'file-input-ghost' => ! $unstyled && $ghost,
        'file-input-primary' => ! $unstyled && $color === 'primary',
        'file-input-secondary' => ! $unstyled && $color === 'secondary',
        'file-input-accent' => ! $unstyled && $color === 'accent',
        'file-input-neutral' => ! $unstyled && $color === 'neutral',
        'file-input-info' => ! $unstyled && $color === 'info',
        'file-input-success' => ! $unstyled && $color === 'success',
        'file-input-warning' => ! $unstyled && $color === 'warning',
        'file-input-error' => ! $unstyled && $color === 'error',
        'file-input-xs' => ! $unstyled && $size === 'xs',
        'file-input-sm' => ! $unstyled && $size === 'sm',
        'file-input-md' => ! $unstyled && $size === 'md',
        'file-input-lg' => ! $unstyled && $size === 'lg',
        'file-input-xl' => ! $unstyled && $size === 'xl',
    ]) }}
/>
