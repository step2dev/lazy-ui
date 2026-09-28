@props([
    'driver' => 'native',
    'value' => null,
    'unstyled' => false,
])

@if ($driver === 'cally')
    <calendar-date {{ $attributes->class([
        'cally bg-base-100 border border-base-300 shadow-lg rounded-box' => ! $unstyled,
    ]) }}>
        <calendar-month></calendar-month>
    </calendar-date>
@elseif ($driver === 'vanilla')
    <div {{ $attributes->class(['vc' => ! $unstyled]) }}>{{ $slot }}</div>
@else
    <input
        type="date"
        @if ($value !== null) value="{{ $value }}" @endif
        {{ $attributes->class(['input' => ! $unstyled]) }}
    />
@endif
