<dialog @if ($id) id="{{ $id }}" @endif {{ $attributes }} @if ($open) open @endif>
    <div @class(['modal-box' => ! $unstyled])>
        @isset($title)<h3 @class(['text-lg font-bold' => ! $unstyled])>{{ $title }}</h3>@endisset
        {{ $slot }}
        @isset($actions)<div @class(['modal-action' => ! $unstyled])>{{ $actions }}</div>@endisset
    </div>
    @isset($backdrop)<form method="dialog" @class(['modal-backdrop' => ! $unstyled])>{{ $backdrop }}</form>@endisset
</dialog>
