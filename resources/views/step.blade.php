<li {{ $attributes }}>
    @isset($icon)<span @class(['step-icon' => ! $unstyled])>{{ $icon }}</span>@endisset
    {{ $slot }}
</li>
