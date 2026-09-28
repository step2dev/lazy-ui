<span {{ $attributes }}>
    <span>
        @forelse ($items as $item)<span>{{ $item }}</span>@empty{{ $slot }}@endforelse
    </span>
</span>
