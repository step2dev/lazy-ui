@props([
    'label' => '',
])

<a role="tab" {{ $attributes }}>{{ $label ?: $slot }}</a>
