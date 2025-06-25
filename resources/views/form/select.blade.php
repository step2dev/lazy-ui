@props([
    'label' => '',
    'placeholder' => '',
    'help' => '',
    'hr' => '',
    'outerClass' => '',
    'icon' => '',
    'rightIcon' => ''
])

@php
    $required = $attributes['required'] ?? false;
    $placeholder = $placeholder ?: $label;
    $parameter = $attributes->wire('model')->value();
    $hasError = $errors->has($parameter);
@endphp
<div class="fieldset {{ $outerClass }}">
    <div class="mb-3 flex{{ $hr ? ' flex-col items-start' : ' flex-row' }}">
        <x-lazy-label :hr="$hr" :label="$label" :hasError="$hasError" :required="$required"/>
        <x-lazy-select :attributes="$attributes">
            {{ $slot }}
        </x-lazy-select>
    </div>
    @if ($help)
        <div class="tooltip w-6" data-tip="{{ $help }}">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                 class="stroke-info h-6 w-6 flex-shrink-0">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
        </div>
    @endif
    @if ($parameter)
        @error($parameter)
        <div class="alert alert-error mt-1 mb-2 shadow-lg">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 flex-shrink-0 stroke-current" fill="none"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                {{ $message }}
            </div>
        </div>
        @enderror
    @endif
</div>
