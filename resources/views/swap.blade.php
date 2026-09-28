<label {{ $attributes }}>
    <input
        type="checkbox"
        @if ($name) name="{{ $name }}" @endif
        value="{{ $value }}"
        @checked($checked)
        @disabled($disabled)
        {{ $inputAttributes }}
    />

    @if ($onLabel !== null)
        <span @class(['swap-on' => ! $unstyled])>{{ $onLabel }}</span>
    @elseif (isset($on))
        <span @class(['swap-on' => ! $unstyled])>{{ $on }}</span>
    @endif

    @if ($offLabel !== null)
        <span @class(['swap-off' => ! $unstyled])>{{ $offLabel }}</span>
    @elseif (isset($off))
        <span @class(['swap-off' => ! $unstyled])>{{ $off }}</span>
    @endif

    @if ($indeterminateLabel !== null)
        <span @class(['swap-indeterminate' => ! $unstyled])>{{ $indeterminateLabel }}</span>
    @elseif (isset($indeterminate))
        <span @class(['swap-indeterminate' => ! $unstyled])>{{ $indeterminate }}</span>
    @endif

    {{ $slot }}
</label>
