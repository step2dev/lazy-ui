@props([
    'title' => '',
    'description' => '',
    'center' => true,
    'unstyled' => false,
])

<section {{ $attributes->class(['hero' => ! $unstyled]) }}>
    <div @class([
        'hero-content' => ! $unstyled,
        'text-center' => ! $unstyled && $center,
    ])>
        <div>
            @if ($title)
                <h1 @class(['text-5xl font-bold' => ! $unstyled])>{{ $title }}</h1>
            @endif

            @if ($description)
                <p @class(['py-6' => ! $unstyled])>{{ $description }}</p>
            @endif

            {{ $slot }}
        </div>
    </div>
</section>
