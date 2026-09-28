<div {{ $attributes }}>
    @isset($marker)
        <span {{ $marker->attributes->class($markerClasses) }}>{{ $marker }}</span>
    @elseif ($indicator !== null)
        <span class="{{ $classes($markerClasses) }}">{{ $indicator }}</span>
    @endisset
    {{ $slot }}
</div>
