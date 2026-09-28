@props(['unstyled' => false])

<div {{ $attributes->class(['hover-3d' => ! $unstyled]) }}>
    {{ $slot }}

    @unless ($unstyled)
        @for ($zone = 0; $zone < 8; $zone++)
            <div aria-hidden="true"></div>
        @endfor
    @endunless
</div>
