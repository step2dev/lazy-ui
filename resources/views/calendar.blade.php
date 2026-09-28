@if ($tag === 'cally')
    <calendar-date {{ $attributes }}>
        @isset($previous){{ $previous }}@endisset
        <calendar-month></calendar-month>
        @isset($next){{ $next }}@endisset
    </calendar-date>
@elseif ($tag === 'vc' || $tag === 'react-day-picker')
    <div {{ $attributes }}>{{ $slot }}</div>
@else
    <input type="date" @if ($value !== null) value="{{ $value }}" @endif {{ $attributes }} />
@endif
