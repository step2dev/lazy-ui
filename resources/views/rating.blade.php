<div {{ $attributes }}>
    @if ($clearable && ! $readonly)
        <input type="radio" name="{{ $name }}" value="0" aria-label="clear" @class(['rating-hidden' => ! $unstyled]) @checked((float) $value === 0.0) {{ $inputAttributes }} />
    @endif

    @foreach ($ratingItems as $item)
        @if ($readonly)
            <div
                @class([
                    'mask' => ! $unstyled,
                    $maskClass => ! $unstyled,
                    $colorClass => ! $unstyled && $colorClass,
                    $item['halfClass'] => ! $unstyled && $item['halfClass'],
                ])
                aria-label="{{ $item['label'] }}"
                @if ($item['checked']) aria-current="true" @endif
            ></div>
        @else
            <input
                type="radio"
                name="{{ $name }}"
                value="{{ $item['value'] }}"
                aria-label="{{ $item['label'] }}"
                @checked($item['checked'])
                @class([
                    'mask' => ! $unstyled,
                    $maskClass => ! $unstyled,
                    $colorClass => ! $unstyled && $colorClass,
                    $item['halfClass'] => ! $unstyled && $item['halfClass'],
                ])
                {{ $inputAttributes }}
            />
        @endif
    @endforeach
</div>
