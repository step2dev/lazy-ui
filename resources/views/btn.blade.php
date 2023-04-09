@props([
    'icon' => null,
    'rightIcon' => null,
    'label' => ''
])
<{{ $tag }} {{ $attributes->merge(['class' => $icon || $rightIcon ? ' gap-2' : '']) }}>
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
