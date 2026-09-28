<div {{ $attributes }}>
    @isset($trigger){{ $trigger }}@else<div tabindex="0" role="button" class="{{ $viewClasses['trigger'] }}">{{ $label }}</div>@endisset
    {{ $slot }}
    @isset($close)<div class="{{ $viewClasses['close'] }}">{{ $close }}</div>@endisset
    @isset($main)<div class="{{ $viewClasses['main'] }}">{{ $main }}</div>@endisset
</div>
