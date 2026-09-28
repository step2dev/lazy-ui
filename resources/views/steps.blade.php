<ul {{ $attributes }}>
    @foreach ($steps as $step)
        <li @class([
            'step' => ! $unstyled,
            'step-primary' => ! $unstyled && $step['active'] && $step['color'] === 'primary',
            'step-secondary' => ! $unstyled && $step['active'] && $step['color'] === 'secondary',
            'step-accent' => ! $unstyled && $step['active'] && $step['color'] === 'accent',
            'step-neutral' => ! $unstyled && $step['active'] && $step['color'] === 'neutral',
            'step-info' => ! $unstyled && $step['active'] && $step['color'] === 'info',
            'step-success' => ! $unstyled && $step['active'] && $step['color'] === 'success',
            'step-warning' => ! $unstyled && $step['active'] && $step['color'] === 'warning',
            'step-error' => ! $unstyled && $step['active'] && $step['color'] === 'error',
        ])>
            @if ($step['icon'] !== null)<span @class(['step-icon' => ! $unstyled])>{{ $step['icon'] }}</span>@endif
            {{ $step['label'] }}
        </li>
    @endforeach
    {{ $slot }}
</ul>
