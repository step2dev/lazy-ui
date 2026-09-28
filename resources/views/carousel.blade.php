<div {{ $attributes }}>
    @foreach ($items as $item)
        <div id="{{ $item['id'] }}" class="{{ $item['classes'] }}">
            @if ($item['src'])<img src="{{ $item['src'] }}" alt="{{ $item['alt'] }}" />@endif
            @if ($item['content'] !== null){{ $item['content'] }}@endif
        </div>
    @endforeach
    {{ $slot }}
</div>
