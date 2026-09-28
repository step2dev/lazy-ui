<div {{ $attributes }}>
    <input id="{{ $id }}" type="checkbox" @class(['drawer-toggle' => ! $unstyled]) @checked($open) />

    <div @class(['drawer-content' => ! $unstyled])>{{ $slot }}</div>

    <div @class(['drawer-side' => ! $unstyled])>
        <label for="{{ $id }}" aria-label="Close sidebar" @class(['drawer-overlay' => ! $unstyled])></label>

        @isset($side)
            <div {{ $side->attributes->class($unstyled ? [] : $sideClasses) }}>{{ $side }}</div>
        @else
            <div @class($unstyled ? [] : $sideClasses)>{{ $drawerContent }}</div>
        @endisset
    </div>
</div>
