<nav {{ $attributes }}>
    @isset($start)<div @class(['navbar-start' => ! $unstyled])>{{ $start }}</div>@endisset
    @isset($center)<div @class(['navbar-center' => ! $unstyled])>{{ $center }}</div>@endisset
    @isset($end)<div @class(['navbar-end' => ! $unstyled])>{{ $end }}</div>@endisset
    {{ $slot }}
</nav>
