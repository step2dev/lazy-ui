@props([
    'id' => null,
    'open' => false,
    'top' => false,
    'middle' => false,
    'bottom' => false,
    'start' => false,
    'end' => false,
    'unstyled' => false,
])

<dialog
    @if ($id) id="{{ $id }}" @endif
    {{ $attributes->class([
        'modal' => ! $unstyled,
        'modal-open' => ! $unstyled && $open,
        'modal-top' => ! $unstyled && $top,
        'modal-middle' => ! $unstyled && $middle,
        'modal-bottom' => ! $unstyled && $bottom,
        'modal-start' => ! $unstyled && $start,
        'modal-end' => ! $unstyled && $end,
    ]) }}
    @if ($open) open @endif
>
    <div @class(['modal-box' => ! $unstyled])>
        @isset($title)
            <h3 @class(['text-lg font-bold' => ! $unstyled])>{{ $title }}</h3>
        @endisset

        {{ $slot }}

        @isset($actions)
            <div @class(['modal-action' => ! $unstyled])>{{ $actions }}</div>
        @endisset
    </div>

    @isset($backdrop)
        <form method="dialog" @class(['modal-backdrop' => ! $unstyled])>{{ $backdrop }}</form>
    @endisset
</dialog>
