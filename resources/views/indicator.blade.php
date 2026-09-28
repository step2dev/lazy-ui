<div {{ $attributes }}>
    @isset($marker)
        <span {{ $marker->attributes->class($unstyled ? [] : $markerClasses) }}>{{ $marker }}</span>
    @elseif ($indicator !== null)
        <span @class($unstyled ? [] : $markerClasses)>{{ $indicator }}</span>
    @endisset
    {{ $slot }}
</div>
