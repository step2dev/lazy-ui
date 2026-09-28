<form action="{{ $target }}" method="POST" class="inline">
    @csrf

    <x-lazy-btn {{ $attributes->except(['action', 'route', 'href']) }}>
        {!! $icon !!}
        <span>{{ __('Logout') }}</span>
    </x-lazy-btn>
</form>
