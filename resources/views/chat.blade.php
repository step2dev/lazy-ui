@props([
    'avatar'=> null,
    'name' => null,
    'message' => null,
    'send_at' => null,
    'status' => null,
])

<div {{ $attributes }}>
    @if($avatar)
        <div class="chat-image avatar">
            <div class="w-10 rounded-full">
                <img src="{{ $avatar }}" alt="{{ $name }}"/>
            </div>
        </div>
    @endif
    @if($name || $send_at)
        <div class="chat-header">
            {{ $name }}
            @if($send_at)
                <time class="text-xs opacity-50">{{ $send_at }}</time>
            @endif
        </div>
    @endif
    <div class="chat-bubble">{{ $slot->isNotEmpty() ? $slot : $message }}</div>
    @if($status)
        <div class="chat-footer opacity-50">
            {{ $status }}
        </div>
    @endif
</div>
