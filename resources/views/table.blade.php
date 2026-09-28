<table {{ $attributes }}>
    @if ($headerItems)
        <thead>
            <tr>
                @foreach ($headerItems as $header)<th @if ($header['classes']) class="{{ $header['classes'] }}" @endif>{{ $header['label'] }}</th>@endforeach
            </tr>
        </thead>
    @endif

    @if ($rowItems)
        <tbody>
            @foreach ($rowItems as $row)
                <tr @if ($row['classes']) class="{{ $row['classes'] }}" @endif>
                    @foreach ($row['cells'] as $cell)<td @if ($cell['classes']) class="{{ $cell['classes'] }}" @endif>{{ $cell['value'] }}</td>@endforeach
                </tr>
            @endforeach
        </tbody>
    @endif

    {{ $slot }}
</table>
