<div {{ $attributes }}>
    @foreach ($stats as $stat)
        <div @class(['stat' => ! $unstyled])>
            @if ($stat['title'])<div @class(['stat-title' => ! $unstyled])>{{ $stat['title'] }}</div>@endif
            @if ($stat['value'] !== '')<div @class(['stat-value' => ! $unstyled])>{{ $stat['value'] }}</div>@endif
            @if ($stat['description'])<div @class(['stat-desc' => ! $unstyled])>{{ $stat['description'] }}</div>@endif
        </div>
    @endforeach
    {{ $slot }}
</div>
