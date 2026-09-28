@aware(['join' => false])

<{{ $tag }} {{ $attributes
    ->merge(['class' => $contentClass])
    ->class([
        'join-item' => $join,
        $standaloneClass => ! $join && $standaloneClass !== '',
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
