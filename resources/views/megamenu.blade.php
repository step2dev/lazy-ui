<div {{ $attributes }}>
    @isset($active)<span class="{{ $viewClasses['active'] }}">{{ $active }}</span>@endisset
    {{ $slot }}
</div>
