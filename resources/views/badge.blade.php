@props([
    'label' => '',
    'icon' => ''
])
<span {{ $attributes->merge(['class'=> 'badge'.($icon ? ' gap-2' : '')]) }}>{{ $icon }}{{ $label ?: $slot }}</span>
