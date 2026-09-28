@props([
    'title' => '',
    'bordered' => false,
    'compact' => false,
    'side' => false,
    'imageFull' => false,
    'unstyled' => false,
])

<div {{ $attributes->class([
    'card' => ! $unstyled,
    'card-border' => ! $unstyled && $bordered,
    'card-sm' => ! $unstyled && $compact,
    'card-side' => ! $unstyled && $side,
    'image-full' => ! $unstyled && $imageFull,
]) }}>
    @isset($figure)
        <figure>{{ $figure }}</figure>
    @endisset

    <div @class(['card-body' => ! $unstyled])>
        @if ($title)
            <h2 @class(['card-title' => ! $unstyled])>{{ $title }}</h2>
        @endif

        {{ $slot }}

        @isset($actions)
            <div @class(['card-actions justify-end' => ! $unstyled])>{{ $actions }}</div>
        @endisset
    </div>
</div>
