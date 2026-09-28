<figure {{ $attributes }}>
    @foreach ($images as $image)
        <img src="{{ $image['src'] }}" alt="{{ $image['alt'] }}" @if ($image['classes']) class="{{ $image['classes'] }}" @endif />
    @endforeach
    {{ $slot }}
</figure>
