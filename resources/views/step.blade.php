@props([
    'color' => '',
    'unstyled' => false,
])

<li {{ $attributes->class([
    'step' => ! $unstyled,
    'step-primary' => ! $unstyled && $color === 'primary',
    'step-secondary' => ! $unstyled && $color === 'secondary',
    'step-accent' => ! $unstyled && $color === 'accent',
    'step-neutral' => ! $unstyled && $color === 'neutral',
    'step-info' => ! $unstyled && $color === 'info',
    'step-success' => ! $unstyled && $color === 'success',
    'step-warning' => ! $unstyled && $color === 'warning',
    'step-error' => ! $unstyled && $color === 'error',
]) }}>
    @isset($icon)
        <span @class(['step-icon' => ! $unstyled])>{{ $icon }}</span>
    @endisset

    {{ $slot }}
</li>
