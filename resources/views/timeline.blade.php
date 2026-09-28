<ul {{ $attributes }}>
    @foreach ($items as $item)
        <li>
            @if ($item['before'])<hr />@endif
            @if ($item['start'] !== null)<div class="{{ $unstyled ? '' : $item['startClasses'] }}">{{ $item['start'] }}</div>@endif
            @if ($item['middle'] !== null)<div class="{{ $unstyled ? '' : $item['middleClasses'] }}">{{ $item['middle'] }}</div>@endif
            @if ($item['end'] !== null)<div class="{{ $unstyled ? '' : $item['endClasses'] }}">{{ $item['end'] }}</div>@endif
            @if ($item['after'])<hr />@endif
        </li>
    @endforeach
    {{ $slot }}
</ul>
