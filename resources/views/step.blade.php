<li {{ $attributes }}>
    @isset($icon)<span class="{{ $viewClasses['icon'] }}">{{ $icon }}</span>@endisset
    {{ $slot }}
</li>
