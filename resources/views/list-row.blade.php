@props(['unstyled' => false])

<li {{ $attributes->class(['list-row' => ! $unstyled]) }}>
    {{ $slot }}
</li>
