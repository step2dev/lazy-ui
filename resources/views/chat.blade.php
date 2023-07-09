@props([
    'avatar'=> '/images/stock/photo-1534528741775-53994a69daeb.jpg',
    'name' => 'Obi-Wan Kenobi',
    'message' => 'You were the Chosen One!',
    'send_at' => '12:45',
    'status' => 'delivered',
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
    <div class="chat-bubble">{{ $message }}</div>
    @if($status)
        <div class="chat-footer opacity-50">
            {{ $status }}
        </div>
    @endif
</div>
