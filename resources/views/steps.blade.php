@props([
    'vertical' => false,
    'unstyled' => false,
])

<ul {{ $attributes->class([
    'steps' => ! $unstyled,
    'steps-vertical' => ! $unstyled && $vertical,
    'steps-horizontal' => ! $unstyled && ! $vertical,
]) }}>
    {{ $slot }}
</ul>
