@props([
    'method' => 'POST',
    'spoofMethod' => false,
])
<form method="{{ $spoofMethod ? 'POST' : $method }}" {{ $attributes }}>
    @if ($spoofMethod)
        @method($method)
    @endif
    @csrf

    {{ $slot }}
</form>
