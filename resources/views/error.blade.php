@props([
    'key' => '',
    'message' => '',
])
@if(! $key && $message)
    <x-lazy-alert error :$message/>
@else
    @error($key)
    <x-lazy-alert error :$message/>
    @enderror
@endif
