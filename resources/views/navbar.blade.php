<nav {{ $attributes }}>
    @isset($start)<div class="{{ $viewClasses['start'] }}">{{ $start }}</div>@endisset
    @isset($center)<div class="{{ $viewClasses['center'] }}">{{ $center }}</div>@endisset
    @isset($end)<div class="{{ $viewClasses['end'] }}">{{ $end }}</div>@endisset
    {{ $slot }}
</nav>
