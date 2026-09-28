@props([
    'value' => null,
    'max' => 100,
    'color' => '',
    'unstyled' => false,
])

<progress
    {{ $attributes->class([
        'progress' => ! $unstyled,
        'progress-primary' => ! $unstyled && $color === 'primary',
        'progress-secondary' => ! $unstyled && $color === 'secondary',
        'progress-accent' => ! $unstyled && $color === 'accent',
        'progress-neutral' => ! $unstyled && $color === 'neutral',
        'progress-info' => ! $unstyled && $color === 'info',
        'progress-success' => ! $unstyled && $color === 'success',
        'progress-warning' => ! $unstyled && $color === 'warning',
        'progress-error' => ! $unstyled && $color === 'error',
    ]) }}
    @if ($value !== null) value="{{ $value }}" @endif
    max="{{ $max }}"
></progress>
