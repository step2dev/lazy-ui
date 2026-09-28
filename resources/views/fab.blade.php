<div {{ $attributes }}>
    @isset($trigger){{ $trigger }}@else<div tabindex="0" role="button" @class(['btn btn-circle' => ! $unstyled])>{{ $label }}</div>@endisset
    {{ $slot }}
    @isset($close)<div @class(['fab-close' => ! $unstyled])>{{ $close }}</div>@endisset
    @isset($main)<div @class(['fab-main-action' => ! $unstyled])>{{ $main }}</div>@endisset
</div>
