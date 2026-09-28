<table {{ $attributes }}>
    @if ($headerItems)
        <thead>
            <tr>
                @foreach ($headerItems as $header)<th class="{{ $header['classes'] }}">{{ $header['label'] }}</th>@endforeach
            </tr>
        </thead>
    @endif

    @if ($rowItems)
        <tbody>
            @foreach ($rowItems as $row)
                <tr class="{{ $row['classes'] }}">
                    @foreach ($row['cells'] as $cell)<td class="{{ $cell['classes'] }}">{{ $cell['value'] }}</td>@endforeach
                </tr>
            @endforeach
        </tbody>
    @endif

    {{ $slot }}
</table>
