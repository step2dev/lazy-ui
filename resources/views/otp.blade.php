@props([
    'length' => 6,
    'name' => 'otp',
    'value' => '',
    'joined' => false,
    'color' => '',
    'size' => '',
    'unstyled' => false,
])

<label {{ $attributes->class([
    'otp' => ! $unstyled,
    'otp-joined' => ! $unstyled && $joined,
    'otp-neutral' => ! $unstyled && $color === 'neutral',
    'otp-primary' => ! $unstyled && $color === 'primary',
    'otp-secondary' => ! $unstyled && $color === 'secondary',
    'otp-accent' => ! $unstyled && $color === 'accent',
    'otp-success' => ! $unstyled && $color === 'success',
    'otp-info' => ! $unstyled && $color === 'info',
    'otp-warning' => ! $unstyled && $color === 'warning',
    'otp-error' => ! $unstyled && $color === 'error',
    'otp-xs' => ! $unstyled && $size === 'xs',
    'otp-sm' => ! $unstyled && $size === 'sm',
    'otp-md' => ! $unstyled && $size === 'md',
    'otp-lg' => ! $unstyled && $size === 'lg',
    'otp-xl' => ! $unstyled && $size === 'xl',
]) }}>
    @for ($index = 0; $index < $length; $index++)
        <span></span>
    @endfor

    <input
        type="text"
        name="{{ $name }}"
        value="{{ $value }}"
        autocomplete="one-time-code"
        inputmode="numeric"
        maxlength="{{ $length }}"
        pattern="[0-9]*"
    />
</label>
