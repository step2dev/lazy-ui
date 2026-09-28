@props([
    'items' => [],
    'unstyled' => false,
])

<span {{ $attributes->class(['text-rotate' => ! $unstyled]) }}>
    <span>
        @forelse ($items as $item)
            <span>{{ $item }}</span>
        @empty
            {{ $slot }}
        @endforelse
    </span>
</span>
