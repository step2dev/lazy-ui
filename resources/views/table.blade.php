<table {{ $attributes }}>
    @if ($headers)
        <thead><tr>@foreach ($headers as $header)<th>{{ $header }}</th>@endforeach</tr></thead>
    @endif

    @if ($rows)
        <tbody>
            @foreach ($rows as $row)
                <tr>
                    @foreach ((array) $row as $cell)<td>{{ $cell }}</td>@endforeach
                </tr>
            @endforeach
        </tbody>
    @endif

    {{ $slot }}
</table>
