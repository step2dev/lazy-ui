<div {{ $attributes }}>
    @if ($items)
        <ul>
            @foreach ($items as $item)
                <li>
                    @if ($item['href'] && ! $item['current'])
                        <a href="{{ $item['href'] }}">{{ $item['label'] }}</a>
                    @else
                        <span @if ($item['current']) aria-current="page" @endif>{{ $item['label'] }}</span>
                    @endif
                </li>
            @endforeach
        </ul>
    @else
        {{ $slot }}
    @endif
</div>
