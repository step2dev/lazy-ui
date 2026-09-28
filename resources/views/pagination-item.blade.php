@if ($tag === 'a')
    <a href="{{ $href }}" {{ $attributes }}>{{ $slot }}</a>
@else
    <button type="button" @disabled($disabled) {{ $attributes }}>{{ $slot }}</button>
@endif
