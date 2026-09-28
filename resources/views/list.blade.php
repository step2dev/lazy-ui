<ul {{ $attributes }}>
    @foreach ($items as $item)
        <li @class(['list-row' => ! $unstyled])>
            @if (is_array($item))
                @foreach ($item as $value)<div>{{ $value }}</div>@endforeach
            @else
                {{ $item }}
            @endif
        </li>
    @endforeach
    {{ $slot }}
</ul>
