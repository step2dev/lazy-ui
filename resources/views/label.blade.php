@props([
    'label' => '',
])

<label {{ $attributes->merge([
    'class' => 'label flex flex-row'.($hr ? ' w-1/6' : ''),
]) }}>
    <span @class(['text-error' => $hasError])>{!! $label ?: $slot !!}</span>
</label>
