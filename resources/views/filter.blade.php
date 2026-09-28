<form {{ $attributes }}>
    <input type="reset" value="{{ $resetLabel }}" @class(['btn btn-square' => ! $unstyled]) />
    @foreach ($items as $item)
        <input type="radio" name="{{ $name }}" value="{{ $item['value'] }}" aria-label="{{ $item['label'] }}" @checked($item['checked']) @class(['btn' => ! $unstyled]) />
    @endforeach
    {{ $slot }}
</form>
