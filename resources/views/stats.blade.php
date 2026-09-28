<div {{ $attributes }}>
    @foreach ($stats as $stat)
        <div class="{{ $unstyled ? '' : $stat['classes'] }}">
            @if ($stat['figure'] !== null)<div @class(['stat-figure' => ! $unstyled])>{{ $stat['figure'] }}</div>@endif
            @if ($stat['title'] !== '')<div @class(['stat-title' => ! $unstyled])>{{ $stat['title'] }}</div>@endif
            @if ($stat['value'] !== '')<div @class(['stat-value' => ! $unstyled])>{{ $stat['value'] }}</div>@endif
            @if ($stat['description'] !== '')<div @class(['stat-desc' => ! $unstyled])>{{ $stat['description'] }}</div>@endif
            @if ($stat['actions'] !== null)<div @class(['stat-actions' => ! $unstyled])>{{ $stat['actions'] }}</div>@endif
        </div>
    @endforeach
    {{ $slot }}
</div>
