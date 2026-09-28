@props([
    'tip' => '',
    'open' => false,
])

<div {{ $attributes }} @if ($tip) data-tip="{{ $tip }}" @endif>
    @isset($content)
        <div class="tooltip-content">{{ $content }}</div>
    @endisset

    {{ $slot }}
</div>
