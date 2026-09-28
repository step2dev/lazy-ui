@props([
    'vertical' => false,
    'compact' => false,
    'snapIcon' => false,
    'unstyled' => false,
])

<ul {{ $attributes->class([
    'timeline' => ! $unstyled,
    'timeline-vertical' => ! $unstyled && $vertical,
    'timeline-horizontal' => ! $unstyled && ! $vertical,
    'timeline-compact' => ! $unstyled && $compact,
    'timeline-snap-icon' => ! $unstyled && $snapIcon,
]) }}>
    {{ $slot }}
</ul>
