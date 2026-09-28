@props([
    'indicator' => null,
    'indicatorClass' => null,
    'color' => 'secondary',
    'size' => null,
    'horizontal' => null,
    'vertical' => null,
    'unstyled' => false,
])

@php
    $colorClasses = [
        'neutral' => 'badge-neutral',
        'primary' => 'badge-primary',
        'secondary' => 'badge-secondary',
        'accent' => 'badge-accent',
        'info' => 'badge-info',
        'success' => 'badge-success',
        'warning' => 'badge-warning',
        'error' => 'badge-error',
    ];

    $sizeClasses = [
        'xs' => 'badge-xs',
        'sm' => 'badge-sm',
        'md' => 'badge-md',
        'lg' => 'badge-lg',
        'xl' => 'badge-xl',
    ];

    $horizontalClasses = [
        'start' => 'indicator-start',
        'center' => 'indicator-center',
        'end' => 'indicator-end',
    ];

    $verticalClasses = [
        'top' => 'indicator-top',
        'middle' => 'indicator-middle',
        'bottom' => 'indicator-bottom',
    ];

    foreach (array_keys($colorClasses) as $candidate) {
        if ($attributes->has($candidate)) {
            $color = $candidate;
            break;
        }
    }

    foreach (array_keys($sizeClasses) as $candidate) {
        if ($attributes->has($candidate)) {
            $size = $candidate;
            break;
        }
    }

    $indicatorAttributes = $attributes->except([
        ...array_keys($colorClasses),
        ...array_keys($sizeClasses),
        'horizontal',
        'vertical',
        'color',
        'size',
        'indicator-class',
        'unstyled',
    ]);

    $markerClasses = [
        'indicator-item' => ! $unstyled,
        'badge' => ! $unstyled && ! $indicatorClass,
        $colorClasses[$color] ?? $colorClasses['secondary'] => ! $unstyled && ! $indicatorClass,
        $sizeClasses[$size] ?? '' => ! $unstyled && ! $indicatorClass && $size,
        $horizontalClasses[$horizontal] ?? '' => ! $unstyled && $horizontal,
        $verticalClasses[$vertical] ?? '' => ! $unstyled && $vertical,
        $indicatorClass => ! $unstyled && filled($indicatorClass),
    ];
@endphp

<div {{ $indicatorAttributes->class(['indicator' => ! $unstyled]) }}>
    @isset($marker)
        <span {{ $marker->attributes->class($markerClasses) }}>
            {{ $marker }}
        </span>
    @elseif ($indicator !== null)
        <span @class($markerClasses)>{{ $indicator }}</span>
    @endisset

    {{ $slot }}
</div>
