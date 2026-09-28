@props([
    'top' => false,
    'bottom' => false,
    'start' => false,
    'end' => false,
    'unstyled' => false,
])

<div {{ $attributes->except('unstyled')->class([
    'stack' => ! $unstyled,
    'stack-top' => ! $unstyled && $top,
    'stack-bottom' => ! $unstyled && $bottom,
    'stack-start' => ! $unstyled && $start,
    'stack-end' => ! $unstyled && $end,
]) }}>
    {{ $slot }}
</div>
