<div {{ $attributes }}>
    @isset($figure)<figure>{{ $figure }}</figure>@endisset
    <div @class(['card-body' => ! $unstyled])>
        @if ($title)<h2 @class(['card-title' => ! $unstyled])>{{ $title }}</h2>@endif
        {{ $slot }}
        @isset($actions)<div @class(['card-actions justify-end' => ! $unstyled])>{{ $actions }}</div>@endisset
    </div>
</div>
