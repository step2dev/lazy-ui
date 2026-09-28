<div {{ $attributes }}>
    @isset($figure)<div @class(['stat-figure' => ! $unstyled])>{{ $figure }}</div>@endisset
    @if ($title)<div @class(['stat-title' => ! $unstyled])>{{ $title }}</div>@endif
    @if ($value !== '')<div @class(['stat-value' => ! $unstyled])>{{ $value }}</div>@endif
    {{ $slot }}
    @if ($description)<div @class(['stat-desc' => ! $unstyled])>{{ $description }}</div>@endif
    @isset($actions)<div @class(['stat-actions' => ! $unstyled])>{{ $actions }}</div>@endisset
</div>
