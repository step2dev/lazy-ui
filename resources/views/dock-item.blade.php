@if ($tag === 'a')
    <a href="{{ $href }}" {{ $attributes }}>
        {{ $slot }}
        @if ($label)<span @class(['dock-label' => ! $unstyled])>{{ $label }}</span>@endif
    </a>
@else
    <button type="button" {{ $attributes }}>
        {{ $slot }}
        @if ($label)<span @class(['dock-label' => ! $unstyled])>{{ $label }}</span>@endif
    </button>
@endif
