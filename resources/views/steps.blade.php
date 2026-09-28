<ul {{ $attributes }}>
    @foreach ($steps as $step)
        <li class="{{ $step['classes'] }}">
            @if ($step['icon'] !== null)<span class="{{ $viewClasses['icon'] }}">{{ $step['icon'] }}</span>@endif
            {{ $step['label'] }}
        </li>
    @endforeach
    {{ $slot }}
</ul>
