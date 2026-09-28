@props(['unstyled' => false])

<ul {{ $attributes->class(['list' => ! $unstyled]) }}>
    {{ $slot }}
</ul>
