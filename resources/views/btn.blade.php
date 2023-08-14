@props([
    'icon' => null,
    'rightIcon' => null,
    'label' => ''
])

@aware([
    'join' => false,
])

<{{ $tag }} {{ $attributes->merge(['class' => $icon || $rightIcon ? ' gap-2' : ''])->class([
    'join-item' => $join,
    'mr-2' => ! $join,
    ]) }}>
@if($icon)
    {{ $icon }}
@endisset
{{ $label }}
{{ $slot }}
@if($rightIcon)
    <div class="">
        {{ $rightIcon }}
    </div>
@endisset
</{{ $tag }}>
