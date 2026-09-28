<div {{ $attributes }}>
    @foreach ($ratingItems as $item)
        <input
            type="radio"
            name="{{ $name }}"
            value="{{ $item['value'] }}"
            aria-label="{{ $item['label'] }}"
            @checked($item['checked'])
            @disabled($readonly)
            @class($unstyled ? [] : $item['classes'])
            {{ $inputAttributes }}
        />
    @endforeach
</div>
