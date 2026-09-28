<form {{ $attributes }}>
    <input type="reset" value="{{ $resetLabel }}" class="{{ $viewClasses['reset'] }}" />
    @foreach ($items as $item)
        <input
            type="radio"
            name="{{ $name }}"
            value="{{ $item['value'] }}"
            aria-label="{{ $item['label'] }}"
            @checked($item['checked'])
            @disabled($item['disabled'])
            class="{{ $item['classes'] }}"
        />
    @endforeach
    {{ $slot }}
</form>
