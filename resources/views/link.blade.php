@props([
    'href' => '#'
])

<a href="{{ $href }}" {{ $attributes->merge(['class' => 'link']) }}>
    {!! $slot !!}
</a>
