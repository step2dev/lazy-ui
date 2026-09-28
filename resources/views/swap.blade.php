<{{ $tag }} {{ $attributes }}>
    @unless ($controlled)
        <input
            type="checkbox"
            @if ($name) name="{{ $name }}" @endif
            value="{{ $value }}"
            @checked($checked)
            @disabled($disabled)
            {{ $inputAttributes }}
        />
    @endunless

    @if ($onLabel !== null)
        <span class="{{ $viewClasses['on'] }}">{{ $onLabel }}</span>
    @elseif (isset($on))
        <span class="{{ $viewClasses['on'] }}">{{ $on }}</span>
    @endif

    @if ($offLabel !== null)
        <span class="{{ $viewClasses['off'] }}">{{ $offLabel }}</span>
    @elseif (isset($off))
        <span class="{{ $viewClasses['off'] }}">{{ $off }}</span>
    @endif

    @if ($indeterminateLabel !== null)
        <span class="{{ $viewClasses['indeterminate'] }}">{{ $indeterminateLabel }}</span>
    @elseif (isset($indeterminate))
        <span class="{{ $viewClasses['indeterminate'] }}">{{ $indeterminate }}</span>
    @endif

    {{ $slot }}
</{{ $tag }}>
