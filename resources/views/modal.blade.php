<dialog @if ($id) id="{{ $id }}" @endif {{ $attributes }} @if ($open) open @endif>
    <div class="{{ $viewClasses['box'] }}">
        @isset($title)<h3 class="{{ $viewClasses['title'] }}">{{ $title }}</h3>@endisset
        {{ $slot }}
        @isset($actions)<div class="{{ $viewClasses['actions'] }}">{{ $actions }}</div>@endisset
    </div>
    @isset($backdrop)<form method="dialog" class="{{ $viewClasses['backdrop'] }}">{{ $backdrop }}</form>@endisset
</dialog>
