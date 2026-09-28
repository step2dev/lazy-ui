@props([
    'href' => null,
    'label' => '',
    'active' => false,
    'unstyled' => false,
])

@if ($href)
    <a href="{{ $href }}" {{ $attributes->class(['dock-active' => ! $unstyled && $active]) }}>
        {{ $slot }}
        @if ($label)
            <span @class(['dock-label' => ! $unstyled])>{{ $label }}</span>
        @endif
    </a>
@else
    <button type="button" {{ $attributes->class(['dock-active' => ! $unstyled && $active]) }}>
        {{ $slot }}
        @if ($label)
            <span @class(['dock-label' => ! $unstyled])>{{ $label }}</span>
        @endif
    </button>
@endif
