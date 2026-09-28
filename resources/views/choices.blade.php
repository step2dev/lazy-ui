@props([
    'options' => [],
    'label' => '',
    'placeholder' => 'Please select a value',
])

@php
    $unstyled = $attributes->has('unstyled');
    $selectAttributes = $attributes->except('unstyled')->class([
        'select w-full' => ! $unstyled,
    ]);
@endphp

<div @class(['fieldset' => ! $unstyled])>
    @if ($label)
        <label @class(['label' => ! $unstyled])>{{ $label }}</label>
    @endif

    <select {{ $selectAttributes }}>
        @if ($placeholder)
            <option value="">{{ $placeholder }}</option>
        @endif

        @foreach ($options as $key => $option)
            @php
                if (is_array($option)) {
                    $value = $option['value'] ?? $key;
                    $text = $option['label'] ?? $option['text'] ?? $value;
                    $disabled = (bool) ($option['disabled'] ?? false);
                } else {
                    $value = is_int($key) ? $option : $key;
                    $text = $option;
                    $disabled = false;
                }
            @endphp
            <option value="{{ $value }}" @disabled($disabled)>{{ $text }}</option>
        @endforeach

        {{ $slot }}
    </select>
</div>
