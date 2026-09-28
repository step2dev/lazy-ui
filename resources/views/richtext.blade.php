@props([
    'hasError' => false,
    'value' => '',
    'options' => [],
    'quillUniq' => 'quill',
    'unstyled' => false,
])

<div
    {{ $attributes->merge([
        'class' => ! $unstyled && $hasError ? 'textarea-error' : '',
    ]) }}
    x-data="quill({
        __value: @entangle($attributes->wire('model')),
        options: {{ $options }},
        __config(instance, quillOptions) {
            return { {{ $config ?? '' }} };
        },
    })"
    x-cloak
>
    <div x-ref="quill">{{ $value ?: $slot }}</div>
</div>
