@props([
    'icon' => null,
    'rightIcon' => null,
    'label' => '',
    'unstyled' => false,
])

@aware([
    'join' => false,
])

<{{ $tag }} {{ $attributes->merge([
    'class' => ! $unstyled && ($icon || $rightIcon) ? 'gap-2' : '',
])->class([
    'join-item' => ! $unstyled && $join,
    'mr-2' => ! $unstyled && ! $join,
]) }}>
@if($icon)
    {{ $icon }}
@endisset
{{ $label }}
{{ $slot }}
@if($rightIcon)
    <div>
        {{ $rightIcon }}
    </div>
@endisset
</{{ $tag }}>
