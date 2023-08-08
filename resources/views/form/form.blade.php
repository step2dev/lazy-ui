@props([
    'method' => 'POST',
    'spoofMethod' => false,
])
<form {{ $attributes }} method="{{ $spoofMethod ? 'POST' : $method }}">
    @if ($spoofMethod)
        @method($method)
    @endif
    @csrf

    {{ $slot }}
</form>
