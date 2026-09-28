@props([
    'first' => false,
    'last' => false,
    'box' => false,
    'unstyled' => false,
])

<li {{ $attributes }}>
    @unless ($first)
        <hr />
    @endunless

    @isset($start)
        <div @class([
            'timeline-start' => ! $unstyled,
            'timeline-box' => ! $unstyled && $box,
        ])>{{ $start }}</div>
    @endisset

    @isset($middle)
        <div @class(['timeline-middle' => ! $unstyled])>{{ $middle }}</div>
    @endisset

    <div @class([
        'timeline-end' => ! $unstyled,
        'timeline-box' => ! $unstyled && $box,
    ])>{{ $end ?? $slot }}</div>

    @unless ($last)
        <hr />
    @endunless
</li>
