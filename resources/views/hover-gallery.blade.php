@props(['unstyled' => false])

<figure {{ $attributes->class(['hover-gallery' => ! $unstyled]) }}>
    {{ $slot }}
</figure>
