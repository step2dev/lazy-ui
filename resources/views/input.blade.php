@props([
    'placeholder' => '',
    'hasError' => false,
])

<input {{ $attributes->merge([
    'class' => 'w-full'.($hasError ? ' text-error input-error' : ''),
    'type' => 'text',
    'placeholder' => $placeholder,
]) }} />
