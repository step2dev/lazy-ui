<li {{ $attributes }}>
    @unless ($first)<hr />@endunless
    @isset($start)<div class="{{ $viewClasses['start'] }}">{{ $start }}</div>@endisset
    @isset($middle)<div class="{{ $viewClasses['middle'] }}">{{ $middle }}</div>@endisset
    <div class="{{ $viewClasses['end'] }}">{{ $end ?? $slot }}</div>
    @unless ($last)<hr />@endunless
</li>
