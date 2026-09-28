<div {{ $attributes }}>
    @isset($trigger)
        {{ $trigger }}
    @else
        <button type="button" tabindex="0" @class(['btn' => ! $unstyled])>{{ $label }}</button>
    @endisset

    <div tabindex="0" @class(['dropdown-content menu bg-base-100 rounded-box z-10 mt-2 w-52 p-2 shadow-sm' => ! $unstyled])>
        {{ $slot }}
    </div>
</div>
