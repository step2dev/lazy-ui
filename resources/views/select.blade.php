@props([
    'placeholder' => '',
    'hasError' => false
])

<select {{ $attributes->merge(['class' => 'input w-full'.($hasError ? ' text-error input-error input-bordered' : ''),  $placeholder ]) }}>
    @if($placeholder)
        <option value="">{{ $placeholder }}</option>
    @endif
    {{ $slot }}
</select>
