<div {{ $attributes->merge(['class' => 'indicator']) }}>
    @if($indicator)
        <span class="indicator-item {{ $indicatorClass }}">{{ $indicator }}</span>
    @endif
    {{ $slot }}
</div>