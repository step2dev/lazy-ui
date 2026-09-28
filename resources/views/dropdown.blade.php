<div {{ $attributes }}>
    @isset($trigger)
        {{ $trigger }}
    @else
        <button type="button" tabindex="0" class="{{ $viewClasses['trigger'] }}">{{ $label }}</button>
    @endisset

    <div tabindex="0" class="{{ $viewClasses['content'] }}">
        {{ $slot }}
    </div>
</div>
