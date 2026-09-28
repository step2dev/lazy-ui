<nav {{ $attributes }} aria-label="Pagination">
    @foreach ($pages as $page)
        @if ($page['href'])
            <a href="{{ $page['href'] }}" @class(['join-item btn' => ! $unstyled, 'btn-active' => ! $unstyled && $page['active']]) aria-current="{{ $page['active'] ? 'page' : 'false' }}">{{ $page['label'] }}</a>
        @else
            <button type="button" @class(['join-item btn' => ! $unstyled, 'btn-active' => ! $unstyled && $page['active']]) aria-current="{{ $page['active'] ? 'page' : 'false' }}">{{ $page['label'] }}</button>
        @endif
    @endforeach
    {{ $slot }}
</nav>
