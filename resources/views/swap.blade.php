<label {{ $attributes }}>
    <input
        type="checkbox"
        @if ($name) name="{{ $name }}" @endif
        value="{{ $value }}"
        @checked($checked)
        @disabled($disabled)
        {{ $inputAttributes }}
    />

    @if ($on !== null)<span @class(['swap-on' => ! $unstyled])>{{ $on }}</span>@elseif (isset($onSlot))<span @class(['swap-on' => ! $unstyled])>{{ $onSlot }}</span>@endif
    @if ($off !== null)<span @class(['swap-off' => ! $unstyled])>{{ $off }}</span>@elseif (isset($offSlot))<span @class(['swap-off' => ! $unstyled])>{{ $offSlot }}</span>@endif
    @if ($indeterminate !== null)<span @class(['swap-indeterminate' => ! $unstyled])>{{ $indeterminate }}</span>@endif

    {{ $slot }}
</label>
