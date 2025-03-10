<?php

namespace Step2dev\LazyUI\Tests\Components;

it('can render button with attribute label', function () {
    $this
        ->blade('<x-lazy-btn-delete/>')
        ->assertSee('class="btn', false);

    $this
        ->blade('<x-lazy-btn-back label="Go"/>')
        ->assertSee('class="btn', false);

    $this
        ->blade('<x-lazy-btn-back label="Go"><i class="fas fa-arrow-left"></i></x-lazy-btn-back>')
        ->assertSee('class="btn', false);
})->todo();

it('can render with sizes attribute', function ($size, $class) {
    $this
        ->blade("<x-lazy-btn-back {$size} />")
        // ->assertSee($class)
        ->assertSee('class="btn', false);

    // $this->blade("<x-lazy-btn size='{$size}'>Go</x-lazy-btn>")
    //     ->assertSee($class);
})->with([
    'lg' => ['lg', 'btn-lg'],
    'md' => ['md', 'btn-md'],
    'sm' => ['sm', 'btn-sm'],
    'xs' => ['xs', 'btn-xs'],
    '' => ['', ''],
    // 'xl' => ['xl', 'btn-xl'],
    // '2xl' => ['2xl', 'btn-2xl'],
])->todo();

it('can render with outline attribute', function () {
    $this
        ->blade('<x-lazy-btn-delete outline/>')
        ->assertSee('btn-outline');
});

// it('can render with disabled attribute', function () {
//    $this
//        ->blade('<x-lazy-btn-delete disabled/>')
//        ->assertSee('btn-disabled')
//        ->assertSee('disabled');
// });
