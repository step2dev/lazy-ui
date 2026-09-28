@props(['unstyled' => false])

<div {{ $attributes->class(['mockup-window border border-base-300' => ! $unstyled]) }}>
    <div @class(['border-t border-base-300' => ! $unstyled])>{{ $slot }}</div>
</div>
