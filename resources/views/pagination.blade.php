<nav {{ $attributes }} aria-label="Pagination">
    @foreach ($pages as $page)
        @if ($page['href'])
            <a href="{{ $page['href'] }}" class="{{ $unstyled ? '' : $page['classes'] }}" @if ($page['active']) aria-current="page" @endif>{{ $page['label'] }}</a>
        @else
            <button type="button" class="{{ $unstyled ? '' : $page['classes'] }}" @disabled($page['disabled']) @if ($page['active']) aria-current="page" @endif>{{ $page['label'] }}</button>
        @endif
    @endforeach
    {{ $slot }}
</nav>
