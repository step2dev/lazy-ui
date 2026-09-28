<ul {{ $attributes }}>
    @foreach ($items as $index => $item)
        <li>
            @if ($index > 0)<hr />@endif
            @if ($item['start'] !== null)<div @class(['timeline-start' => ! $unstyled, 'timeline-box' => ! $unstyled && $box])>{{ $item['start'] }}</div>@endif
            @if ($item['middle'] !== null)<div @class(['timeline-middle' => ! $unstyled])>{{ $item['middle'] }}</div>@endif
            @if ($item['end'] !== null)<div @class(['timeline-end' => ! $unstyled, 'timeline-box' => ! $unstyled && $box])>{{ $item['end'] }}</div>@endif
            @if ($index < count($items) - 1)<hr />@endif
        </li>
    @endforeach
    {{ $slot }}
</ul>
