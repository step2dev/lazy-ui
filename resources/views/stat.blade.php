<div {{ $attributes }}>
    @isset($figure)<div class="{{ $viewClasses['figure'] }}">{{ $figure }}</div>@endisset
    @if ($title)<div class="{{ $viewClasses['title'] }}">{{ $title }}</div>@endif
    @if ($value !== '')<div class="{{ $viewClasses['value'] }}">{{ $value }}</div>@endif
    {{ $slot }}
    @if ($description)<div class="{{ $viewClasses['description'] }}">{{ $description }}</div>@endif
    @isset($actions)<div class="{{ $viewClasses['actions'] }}">{{ $actions }}</div>@endisset
</div>
