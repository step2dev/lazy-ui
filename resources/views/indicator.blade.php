<div {{ $attributes }}>
    @isset($marker)
        <span {{ $marker->attributes->merge(['class' => $markerClass]) }}>{{ $marker }}</span>
    @elseif ($indicator !== null)
        <span class="{{ $markerClass }}">{{ $indicator }}</span>
    @endisset
    {{ $slot }}
</div>
