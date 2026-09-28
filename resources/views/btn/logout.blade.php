@props([
    'icon' => '',
    'action' => null,
    'route' => 'logout',
])

@php
    $target = $action;

    if ($target === null) {
        $target = app('router')->has($route)
            ? route($route)
            : '#';
    }
@endphp

<form action="{{ $target }}" method="POST" class="inline">
    @csrf

    <x-lazy-btn {{ $attributes->except(['action', 'route', 'href']) }}>
        {!! $icon !!}
        <span>{{ __('Logout') }}</span>
    </x-lazy-btn>
</form>
