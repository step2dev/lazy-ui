<div {{ $attributes }}>
    {{ $slot }}
    @unless ($unstyled)
        @foreach ($zones as $zone)<div aria-hidden="true"></div>@endforeach
    @endunless
</div>
