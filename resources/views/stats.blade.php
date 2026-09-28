@props([
    'vertical' => false,
    'horizontal' => false,
    'unstyled' => false,
])

<div {{ $attributes->class([
    'stats' => ! $unstyled,
    'stats-vertical' => ! $unstyled && $vertical,
    'stats-horizontal' => ! $unstyled && $horizontal,
]) }}>
    {{ $slot }}
</div>
