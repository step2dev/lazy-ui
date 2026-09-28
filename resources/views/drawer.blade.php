<div {{ $attributes }}>
    <input id="{{ $id }}" type="checkbox" class="{{ $viewClasses['toggle'] }}" @checked($open) />

    <div class="{{ $viewClasses['content'] }}">{{ $slot }}</div>

    <div class="{{ $viewClasses['side'] }}">
        <label for="{{ $id }}" aria-label="Close sidebar" class="{{ $viewClasses['overlay'] }}"></label>

        @isset($side)
            <div {{ $side->attributes->merge(['class' => $viewClasses['panel']]) }}>{{ $side }}</div>
        @else
            <div class="{{ $viewClasses['panel'] }}">{{ $drawerContent }}</div>
        @endisset
    </div>
</div>
