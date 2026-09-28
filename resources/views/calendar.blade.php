@if ($tag === 'cally')
    <calendar-date {{ $attributes }}>
        <calendar-month></calendar-month>
    </calendar-date>
@elseif ($tag === 'vanilla')
    <div {{ $attributes }}>{{ $slot }}</div>
@else
    <input type="date" @if ($value !== null) value="{{ $value }}" @endif {{ $attributes }} />
@endif
