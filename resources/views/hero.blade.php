@props([
    'title' => '',
    'description' => '',
    'background' => 'base-200',
    'align' => 'center',
    'width' => 'md',
    'titleSize' => 'lg',
    'spacing' => 'md',
    'unstyled' => false,
])

@php
    $backgroundClasses = [
        'none' => '',
        'base-100' => 'bg-base-100',
        'base-200' => 'bg-base-200',
        'base-300' => 'bg-base-300',
        'neutral' => 'bg-neutral text-neutral-content',
        'primary' => 'bg-primary text-primary-content',
        'secondary' => 'bg-secondary text-secondary-content',
    ];

    $alignClasses = [
        'start' => 'text-left',
        'center' => 'text-center',
        'end' => 'text-right',
    ];

    $widthClasses = [
        'none' => '',
        'sm' => 'max-w-sm',
        'md' => 'max-w-md',
        'lg' => 'max-w-lg',
        'xl' => 'max-w-xl',
        'full' => 'max-w-none',
    ];

    $titleSizeClasses = [
        'xs' => 'text-2xl',
        'sm' => 'text-3xl',
        'md' => 'text-4xl',
        'lg' => 'text-5xl',
        'xl' => 'text-6xl',
    ];

    $spacingClasses = [
        'none' => '',
        'xs' => 'py-2',
        'sm' => 'py-4',
        'md' => 'py-6',
        'lg' => 'py-8',
    ];
@endphp

<section {{ $attributes->class([
    'hero' => ! $unstyled,
    $backgroundClasses[$background] ?? $backgroundClasses['base-200'] => ! $unstyled && ($backgroundClasses[$background] ?? $backgroundClasses['base-200']),
]) }}>
    <div @class([
        'hero-content' => ! $unstyled,
        $alignClasses[$align] ?? $alignClasses['center'] => ! $unstyled,
    ])>
        <div @class([
            $widthClasses[$width] ?? $widthClasses['md'] => ! $unstyled && ($widthClasses[$width] ?? $widthClasses['md']),
        ])>
            @isset($heading)
                <h1 {{ $heading->attributes->class([
                    'font-bold' => ! $unstyled,
                    $titleSizeClasses[$titleSize] ?? $titleSizeClasses['lg'] => ! $unstyled,
                ]) }}>
                    {{ $heading }}
                </h1>
            @elseif ($title)
                <h1 @class([
                    'font-bold' => ! $unstyled,
                    $titleSizeClasses[$titleSize] ?? $titleSizeClasses['lg'] => ! $unstyled,
                ])>{{ $title }}</h1>
            @endisset

            @isset($lead)
                <div {{ $lead->attributes->class([
                    $spacingClasses[$spacing] ?? $spacingClasses['md'] => ! $unstyled && ($spacingClasses[$spacing] ?? $spacingClasses['md']),
                ]) }}>
                    {{ $lead }}
                </div>
            @elseif ($description)
                <p @class([
                    $spacingClasses[$spacing] ?? $spacingClasses['md'] => ! $unstyled && ($spacingClasses[$spacing] ?? $spacingClasses['md']),
                ])>{{ $description }}</p>
            @endisset

            {{ $slot }}

            @isset($actions)
                <div {{ $actions->attributes }}>
                    {{ $actions }}
                </div>
            @endisset
        </div>
    </div>
</section>
