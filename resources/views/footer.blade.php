@props([
    'horizontal' => false,
    'center' => false,
    'unstyled' => false,
])

<footer {{ $attributes->class([
    'footer' => ! $unstyled,
    'footer-horizontal' => ! $unstyled && $horizontal,
    'footer-center' => ! $unstyled && $center,
]) }}>
    {{ $slot }}
</footer>
