<form {{ $attributes }}>
    <input type="reset" value="{{ $resetLabel }}" @class(['btn btn-square' => ! $unstyled]) />
    @foreach ($items as $item)
        <input
            type="radio"
            name="{{ $name }}"
            value="{{ $item['value'] }}"
            aria-label="{{ $item['label'] }}"
            @checked($item['checked'])
            @disabled($item['disabled'])
            class="{{ $unstyled ? '' : $item['classes'] }}"
        />
    @endforeach
    {{ $slot }}
</form>
