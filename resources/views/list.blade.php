<ul {{ $attributes }}>
    @foreach ($rows as $row)
        <li class="{{ $row['classes'] }}">
            @foreach ($row['cells'] as $cell)<div>{{ $cell }}</div>@endforeach
        </li>
    @endforeach
    {{ $slot }}
</ul>
