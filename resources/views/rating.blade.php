<div {{ $attributes }}>
    @foreach ($ratingItems as $item)
        @if ($readonly)
            <div
                aria-label="{{ $item['label'] }}"
                @if ($item['checked']) aria-current="true" @endif
                class="{{ $item['classes'] }}"
            ></div>
        @else
            <input
                type="radio"
                name="{{ $name }}"
                value="{{ $item['value'] }}"
                aria-label="{{ $item['label'] }}"
                @checked($item['checked'])
                class="{{ $item['classes'] }}"
                {{ $inputAttributes }}
            />
        @endif
    @endforeach
</div>
