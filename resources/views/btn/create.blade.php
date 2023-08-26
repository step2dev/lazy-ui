@props([
    'href' => '#'
])

<x-lazy-btn xs light :href="$href" {{ $attributes }}>
    {{ $slot ?: __('lazy::buttons.create') }}
</x-lazy-btn>
