@props([
    'label' => '',
    'icon' => '',
    'unstyled' => false,
])

<span {{ $attributes->merge(['class' => ! $unstyled && $icon ? 'gap-2' : '']) }}>
    {{ $icon }}{{ $label ?: $slot }}
</span>
