@props([
    'label' => '',
    'icon' => ''
])
<span {{ $attributes->merge(['class'=> ($icon ? ' gap-2' : '')]) }}>{{ $icon }}{{ $label ?: $slot }}</span>
