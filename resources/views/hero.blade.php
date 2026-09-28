<section {{ $attributes }}>
    <div @class($unstyled ? [] : $contentClasses)>
        <div @class($unstyled ? [] : $innerClasses)>
            @isset($heading)
                <h1 {{ $heading->attributes->class($unstyled ? [] : $titleClasses) }}>{{ $heading }}</h1>
            @elseif ($title)
                <h1 @class($unstyled ? [] : $titleClasses)>{{ $title }}</h1>
            @endisset

            @isset($lead)
                <div {{ $lead->attributes->class($unstyled ? [] : $spacingClasses) }}>{{ $lead }}</div>
            @elseif ($description)
                <p @class($unstyled ? [] : $spacingClasses)>{{ $description }}</p>
            @endisset

            {{ $slot }}
            @isset($actions)<div {{ $actions->attributes }}>{{ $actions }}</div>@endisset
        </div>
    </div>
</section>
