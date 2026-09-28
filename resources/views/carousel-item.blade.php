@props(['unstyled' => false])

<div {{ $attributes->class(['carousel-item' => ! $unstyled]) }}>
    {{ $slot }}
</div>
