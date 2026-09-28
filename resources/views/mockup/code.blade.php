@props([
    'prefix' => '$',
    'unstyled' => false,
])

<div {{ $attributes->class(['mockup-code' => ! $unstyled]) }}>
    <pre data-prefix="{{ $prefix }}"><code>{{ $slot }}</code></pre>
</div>
