<?php

namespace Lazyadm\LazyComponent\Tests\Components;

it('can render chat', function () {
    $this
        ->blade('<x-lazy-chat
                message="test message"
            />')
        ->assertSee('chat')
        ->assertSee('chat-start')
        ->assertSee('test message')
        ->assertSee('chat-bubble')
        ->assertDontSee('CrazyBoy49z')
        ->assertDontSee('https://picsum.photos/200/200?random=1');

    $this
        ->blade('<x-lazy-chat
                message="test message"
                avatar="https://picsum.photos/200/200?random=1"
            />')
        ->assertSee('chat')
        ->assertSee('chat-start')
        ->assertSee('test message')
        ->assertSee('chat-bubble')
        ->assertSee('chat-image')
        ->assertSee('https://picsum.photos/200/200?random=1')
        ->assertSee('avatar');

    $this
        ->blade('<x-lazy-chat
                message="test message"
                avatar="https://picsum.photos/200/200?random=1"
                name="CrazyBoy49z"
            />')
        ->assertSee('chat')
        ->assertSee('chat-start')
        ->assertSee('test message')
        ->assertSee('chat-bubble')
        ->assertSee('chat-image')
        ->assertSee('https://picsum.photos/200/200?random=1')
        ->assertSee('chat-header')
        ->assertSee('CrazyBoy49z')
        ->assertSee('avatar');

    $this
        ->blade('<x-lazy-chat
                message="test message"
                avatar="https://picsum.photos/200/200?random=1"
                name="CrazyBoy49z"
                send_at="12:00"
                position="right"
            />')
        ->assertSee('chat')
        ->assertSee('chat-end')
        ->assertSee('test message')
        ->assertSee('chat-bubble')
        ->assertSee('chat-image')
        ->assertSee('https://picsum.photos/200/200?random=1')
        ->assertSee('chat-header')
        ->assertSee('CrazyBoy49z')
        ->assertSee('time')
        ->assertSee('12:00')
        ->assertSee('avatar');

    $this
        ->blade('<x-lazy-chat
                message="test message"
                avatar="https://picsum.photos/200/200?random=1"
                name="CrazyBoy49z"
                send_at="12:00"
                position="right"
                status="read"
            />')
        ->assertSee('chat')
        ->assertSee('chat-end')
        ->assertSee('test message')
        ->assertSee('chat-bubble')
        ->assertSee('chat-image')
        ->assertSee('https://picsum.photos/200/200?random=1')
        ->assertSee('chat-header')
        ->assertSee('CrazyBoy49z')
        ->assertSee('time')
        ->assertSee('12:00')
        ->assertSee('avatar')
        ->assertSee('chat-footer')
        ->assertSee('read');
});

it('can render chat with colors', function ($parameter, $class) {
    $this
        ->blade("<x-lazy-chat
                message=\"test message\"
                avatar=\"https://picsum.photos/200/200?random=1\"
                name=\"CrazyBoy49z\"
                send_at=\"12:00\"
                position=\"right\"
                status=\"read\"
                {$parameter}
            />")
        ->assertSee('chat')
        ->assertSee('chat-end')
        ->assertSee('test message')
        ->assertSee('chat-bubble')
        ->assertSee('chat-image')
        ->assertSee('https://picsum.photos/200/200?random=1')
        ->assertSee('chat-header')
        ->assertSee('CrazyBoy49z')
        ->assertSee('time')
        ->assertSee('12:00')
        ->assertSee('avatar')
        ->assertSee('chat-footer')
        ->assertSee('read')
        ->assertSee($class);
})->with([
    'primary' => ['primary', 'chat-bubble-primary'],
    'secondary' => ['secondary', 'chat-bubble-secondary'],
    'accent' => ['accent', 'chat-bubble-accent'],
    'info' => ['info', 'chat-bubble-info'],
    'success' => ['success', 'chat-bubble-success'],
    'warning' => ['warning', 'chat-bubble-warning'],
    'error' => ['error', 'chat-bubble-error'],
]);
