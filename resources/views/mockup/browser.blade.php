@props([
    'url' => '',
    'unstyled' => false,
])

<div {{ $attributes->class(['mockup-browser border border-base-300' => ! $unstyled]) }}>
    @if ($url)
        <div @class(['mockup-browser-toolbar' => ! $unstyled])>
            <div @class(['input border border-base-300' => ! $unstyled])>{{ $url }}</div>
        </div>
    @endif

    <div @class(['border-t border-base-300' => ! $unstyled])>{{ $slot }}</div>
</div>
