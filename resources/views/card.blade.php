<{{ $tag }} {{ $attributes }}>
    @isset($figure)<figure>{{ $figure }}</figure>@endisset
    <div class="{{ $viewClasses['body'] }}">
        @if ($title)<h2 class="{{ $viewClasses['title'] }}">{{ $title }}</h2>@endif
        {{ $slot }}
        @isset($actions)<div class="{{ $viewClasses['actions'] }}">{{ $actions }}</div>@endisset
    </div>
</{{ $tag }}>
