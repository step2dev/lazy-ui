<div {{ $attributes }}>
    @foreach ($ratingItems as $item)
        @if ($readonly)
            <div
                aria-label="{{ $item['label'] }}"
                @if ($item['checked']) aria-current="true" @endif
                @class($unstyled ? [] : $item['classes'])
            ></div>
        @else
            <input
                type="radio"
                name="{{ $name }}"
                value="{{ $item['value'] }}"
                aria-label="{{ $item['label'] }}"
                @checked($item['checked'])
                @class($unstyled ? [] : $item['classes'])
                {{ $inputAttributes }}
            />
        @endif
    @endforeach
</div>
