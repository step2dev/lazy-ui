@props([
    'placeholder' => '',
    'hasError' => false,
])

<select {{ $attributes->merge([
    'class' => 'w-full'.($hasError ? ' text-error select-error' : ''),
]) }}>
    @if ($placeholder)
        <option value="">{{ $placeholder }}</option>
    @endif
    {{ $slot }}
</select>
