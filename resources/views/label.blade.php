@props([
    'label' => ''
])

<label {{ $attributes->merge([
    'class' => 'label flex flex-row'. $hr ? 'w-1/6' : '',
]) }}>
    <span class="label-text{{ $hasError ? ' text-error' : '' }}">{!! $label ?: $slot !!}</span>
</label>
