<label {{ $attributes }}>
    {{ $slot }}
    @isset($on)<span @class(['swap-on' => ! $unstyled])>{{ $on }}</span>@endisset
    @isset($off)<span @class(['swap-off' => ! $unstyled])>{{ $off }}</span>@endisset
    @isset($indeterminate)<span @class(['swap-indeterminate' => ! $unstyled])>{{ $indeterminate }}</span>@endisset
</label>
