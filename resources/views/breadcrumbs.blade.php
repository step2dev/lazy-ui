<div {{ $attributes }}>
    @if ($items)
        <ul>
            @foreach ($items as $item)
                <li>
                    @if ($item['href'] && ! $item['current'])
                        <a href="{{ $item['href'] }}">{{ $item['label'] }}</a>
                    @elseif ($item['current'])
                        <span aria-current="page">{{ $item['label'] }}</span>
                    @else
                        <span>{{ $item['label'] }}</span>
                    @endif
                </li>
            @endforeach
        </ul>
    @else
        {{ $slot }}
    @endif
</div>
