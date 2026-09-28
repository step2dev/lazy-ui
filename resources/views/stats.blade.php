<div {{ $attributes }}>
    @foreach ($stats as $stat)
        <div class="{{ $stat['classes'] }}">
            @if ($stat['figure'] !== null)<div class="{{ $viewClasses['figure'] }}">{{ $stat['figure'] }}</div>@endif
            @if ($stat['title'] !== '')<div class="{{ $viewClasses['title'] }}">{{ $stat['title'] }}</div>@endif
            @if ($stat['value'] !== '')<div class="{{ $viewClasses['value'] }}">{{ $stat['value'] }}</div>@endif
            @if ($stat['description'] !== '')<div class="{{ $viewClasses['description'] }}">{{ $stat['description'] }}</div>@endif
            @if ($stat['actions'] !== null)<div class="{{ $viewClasses['actions'] }}">{{ $stat['actions'] }}</div>@endif
        </div>
    @endforeach
    {{ $slot }}
</div>
