@props([
    'options' => [],
    'name' => 'filter',
    'resetLabel' => '×',
    'unstyled' => false,
])

<form {{ $attributes->class(['filter' => ! $unstyled]) }}>
    <input
        type="reset"
        value="{{ $resetLabel }}"
        @class(['btn btn-square' => ! $unstyled])
    />

    @foreach ($options as $value => $label)
        <input
            type="radio"
            name="{{ $name }}"
            value="{{ is_int($value) ? $label : $value }}"
            aria-label="{{ $label }}"
            @class(['btn' => ! $unstyled])
        />
    @endforeach

    {{ $slot }}
</form>
