<ul {{ $attributes }}>
    @foreach ($steps as $step)
        <li class="{{ $unstyled ? '' : $step['classes'] }}">
            @if ($step['icon'] !== null)<span @class(['step-icon' => ! $unstyled])>{{ $step['icon'] }}</span>@endif
            {{ $step['label'] }}
        </li>
    @endforeach
    {{ $slot }}
</ul>
