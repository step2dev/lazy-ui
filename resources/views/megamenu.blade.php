<div {{ $attributes }}>
    @isset($active)<span @class(['megamenu-active' => ! $unstyled])>{{ $active }}</span>@endisset
    {{ $slot }}
</div>
