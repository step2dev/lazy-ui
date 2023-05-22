@props([
    'placeholder' => '',
    'hasError' => false
])

<input {{ $attributes->merge(['class' => 'input w-full'.($hasError ? ' text-error input-error input-bordered' : ''), 'type' => 'text', 'placeholder' => $placeholder ]) }} />
