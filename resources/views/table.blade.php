<table {{ $attributes }}>
    @if ($headerItems)
        <thead>
            <tr>
                @foreach ($headerItems as $header)
                    @if ($header['classes'])
                        <th class="{{ $header['classes'] }}">{{ $header['label'] }}</th>
                    @else
                        <th>{{ $header['label'] }}</th>
                    @endif
                @endforeach
            </tr>
        </thead>
    @endif

    @if ($rowItems)
        <tbody>
            @foreach ($rowItems as $row)
                <tr @if ($row['classes']) class="{{ $row['classes'] }}" @endif>
                    @foreach ($row['cells'] as $cell)
                        @if ($cell['classes'])
                            <td class="{{ $cell['classes'] }}">{{ $cell['value'] }}</td>
                        @else
                            <td>{{ $cell['value'] }}</td>
                        @endif
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    @endif

    {{ $slot }}
</table>
