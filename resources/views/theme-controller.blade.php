@props([
    'theme' => 'light',
    'type' => 'checkbox',
    'unstyled' => false,
])

<input
    type="{{ $type }}"
    value="{{ $theme }}"
    {{ $attributes->class(['theme-controller' => ! $unstyled]) }}
/>
