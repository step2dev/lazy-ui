@props([
    'label' => '',
    'help' => '',
    'hr' => false
])
@php
    $required = $attributes['required'] ?? null;
    if ($label) {
        $label .= ($required ? '<i class="text-error">*</i>' : '');
    }
    $model = $attributes->wire('model');
    $parameter = $model->value() ?? $attributes->get('name');;
    $class = [];
@endphp

<div class="{{ $label ? 'form-control' : 'inline-block' }}">
    <label
        class="label cursor-pointer{{ $hr ? ' flex flex-col items-start' : 'flex flex-row items-center justify-start' }}">
        <input id="{{ $parameter }}" {{ $attributes }}/>
        <span class="label-text{{ $hr ? ' mb-1' : ' ml-2' }}">{!! $label !!}</span>
    </label>
    @if ($help)
        <div class="tooltip float-left w-6" data-tip="{{ $help }}">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                 class="stroke-info h-6 w-6 flex-shrink-0">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
        </div>
    @endif
    @if ($parameter)
        @error($parameter)
        <x-lazy-alert type="error" class="mt-1 mb-2 shadow-lg" :message="$message">
        @enderror
    @endif
</div>
