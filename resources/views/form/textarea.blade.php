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
<div class="form-control {{ $outerClass }}">
    <div class="mb-3 flex{{ $hr ? ' flex-col items-start' : ' flex-row' }}">
        <x-lazy-label :hr="$hr" :label="$label" :hasError="$hasError" :required="$required"/>
        {{--        <input {{ $attributes->merge(['class' => 'input w-full'.($hasError ? ' text-error' : ''), 'type' => 'text', 'placeholder' => $placeholder ]) }} />--}}
        {{ $slot }}
        <x-lazy-textarea :placeholder="$placeholder" :attributes="$attributes" :hasError="$hasError"/>
        @if($rightIcon)
            {{ $rightIcon }}
        @endif
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
        <x-lazy-alert error :message="$message"/>
        @enderror
    @endif
</div>

