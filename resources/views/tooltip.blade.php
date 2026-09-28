@props([
    'tip' => '',
    'open' => false,
    'position' => null,
    'color' => null,
    'unstyled' => false,
])

@php
    $resolvedPosition = $position ?: 'top';

    foreach (['top', 'right', 'bottom', 'left'] as $candidate) {
        if ($attributes->has($candidate)) {
            $resolvedPosition = $candidate;
            break;
        }
    }

    $resolvedColor = $color;

    foreach (['primary', 'secondary', 'accent', 'info', 'success', 'warning', 'error'] as $candidate) {
        if ($attributes->has($candidate)) {
            $resolvedColor = $candidate;
            break;
        }
    }

    $tooltipAttributes = $attributes->except([
        'top',
        'right',
        'bottom',
        'left',
        'primary',
        'secondary',
        'accent',
        'info',
        'success',
        'warning',
        'error',
        'open',
        'position',
        'color',
        'unstyled',
    ]);
@endphp

<div
    {{ $tooltipAttributes->class([
        'tooltip' => ! $unstyled,
        'tooltip-open' => ! $unstyled && $open,
        'tooltip-top' => ! $unstyled && $resolvedPosition === 'top',
        'tooltip-right' => ! $unstyled && $resolvedPosition === 'right',
        'tooltip-bottom' => ! $unstyled && $resolvedPosition === 'bottom',
        'tooltip-left' => ! $unstyled && $resolvedPosition === 'left',
        'tooltip-primary' => ! $unstyled && $resolvedColor === 'primary',
        'tooltip-secondary' => ! $unstyled && $resolvedColor === 'secondary',
        'tooltip-accent' => ! $unstyled && $resolvedColor === 'accent',
        'tooltip-info' => ! $unstyled && $resolvedColor === 'info',
        'tooltip-success' => ! $unstyled && $resolvedColor === 'success',
        'tooltip-warning' => ! $unstyled && $resolvedColor === 'warning',
        'tooltip-error' => ! $unstyled && $resolvedColor === 'error',
    ]) }}
    @if ($tip) data-tip="{{ $tip }}" @endif
>
    @isset($content)
        <div class="tooltip-content">{{ $content }}</div>
    @endisset

    {{ $slot }}
</div>
