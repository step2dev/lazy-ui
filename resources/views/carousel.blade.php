@props([
    'vertical' => false,
    'center' => false,
    'end' => false,
    'unstyled' => false,
])

<div {{ $attributes->class([
    'carousel' => ! $unstyled,
    'carousel-vertical' => ! $unstyled && $vertical,
    'carousel-center' => ! $unstyled && $center,
    'carousel-end' => ! $unstyled && $end,
]) }}>
    {{ $slot }}
</div>
