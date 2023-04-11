@props([
    'href' => '#'
])

<x-lazy-btn xs light :href="$href" {{ $attributes }}>
    <i class="bx bxs-plus-square"></i> {!! $slot !!}
</x-lazy-btn>
