<section {{ $attributes }}>
    <div class="{{ $viewClasses['content'] }}">
        <div class="{{ $viewClasses['inner'] }}">
            @isset($heading)
                <h1 {{ $heading->attributes->merge(['class' => $viewClasses['title']]) }}>{{ $heading }}</h1>
            @elseif ($title)
                <h1 class="{{ $viewClasses['title'] }}">{{ $title }}</h1>
            @endisset

            @isset($lead)
                <div {{ $lead->attributes->merge(['class' => $viewClasses['spacing']]) }}>{{ $lead }}</div>
            @elseif ($description)
                <p class="{{ $viewClasses['spacing'] }}">{{ $description }}</p>
            @endisset

            {{ $slot }}
            @isset($actions)<div {{ $actions->attributes }}>{{ $actions }}</div>@endisset
        </div>
    </div>
</section>
