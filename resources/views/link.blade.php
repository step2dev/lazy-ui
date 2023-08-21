@props([
    'label' => '',
    'href' => '#',
])

<a href="{{ $href }}" {{ $attributes }}>
    {!! $label ?: $slot !!}
</a>
