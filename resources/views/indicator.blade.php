@props([
    'indicator' => null,
    'indicatorClass' => 'badge badge-secondary',
    'unstyled' => false,
])

<div {{ $attributes->class(['indicator' => ! $unstyled]) }}>
    @if ($indicator !== null)
        <span @class([
            'indicator-item' => ! $unstyled,
            $indicatorClass => ! $unstyled,
        ])>{{ $indicator }}</span>
    @endif

    {{ $slot }}
</div>
