<?php

namespace Lazyadm\LazyComponent\Tests\Components;

use Lazyadm\LazyComponent\Components\Btn;

it('should have an array of allowed sizes', function () {
    $component = new Btn();

    expect($component->allowedSizes())->toBeArray();
});

it('should have an array of allowed colors', function () {
    $component = new Btn();

    expect($component->allowedColors())->toBeArray();
});

it('can render button with attribute label', function () {
    $this
        ->blade('<x-lazy-btn label="Go"/>')
        ->assertSee('type="submit"', false)
        ->assertSee('class="btn', false)
        ->assertSee('wire:loading.class="btn-disabled loading"', false)
        ->assertSee('wire:loading.attr="disabled"', false)
        ->assertSee('Go');
});

it('can render button without attribute label', function () {
    $this
        ->blade('<x-lazy-btn>Go</x-lazy-btn>')
        ->assertSee('type="submit"', false)
        ->assertSee('class="btn', false)
        ->assertSee('wire:loading.class="btn-disabled loading"', false)
        ->assertSee('wire:loading.attr="disabled"', false)
        ->assertSee('Go');
});

it('can render with colors attribute', function () {
    $this
        ->blade('<x-lazy-btn primary />')
        ->assertSee('btn-primary');

    $this
        ->blade('<x-lazy-btn accent />')
        ->assertSee('btn-accent');

    $this
        ->blade('<x-lazy-btn info />')
        ->assertSee('btn-info');

    $this
        ->blade('<x-lazy-btn success />')
        ->assertSee('btn-success');

    $this
        ->blade('<x-lazy-btn warning/>')
        ->assertSee('btn-warning');

    $this
        ->blade('<x-lazy-btn error/>')
        ->assertSee('btn-error');

    $this
        ->blade('<x-lazy-btn ghost/>')
        ->assertSee('btn-ghost');

    $this
        ->blade('<x-lazy-btn link/>')
        ->assertSee('btn-link');
});

it('can render with sizes attribute', function ($size, $class) {
    $this
        ->blade("<x-lazy-btn {$size} />")
        ->assertSee($class);

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
]);

it('can render with outline attribute', function () {
    $this
        ->blade('<x-lazy-btn outline/>')
        ->assertSee('btn-outline');
});

it('can render with disabled attribute', function () {
    $this
        ->blade('<x-lazy-btn disabled/>')
        ->assertSee('btn-disabled')
        ->assertSee('disabled');
});

it('can render with glass attribute', function () {
    $this
        ->blade('<x-lazy-btn glass/>')
        ->assertSee('glass');
});

it('can render with active attribute', function () {
    $this
        ->blade('<x-lazy-btn active/>')
        ->assertSee('btn-active');
});

it('can render with wide attribute', function () {
    $this
        ->blade('<x-lazy-btn wide/>')
        ->assertSee('btn-wide');
});

it('can render with block attribute', function () {
    $this
        ->blade('<x-lazy-btn block/>')
        ->assertSee('btn-block');
});

it('can render with circle attribute', function () {
    $this
        ->blade('<x-lazy-btn circle/>')
        ->assertSee('btn-circle');
});

it('can render with square attribute', function () {
    $this
        ->blade('<x-lazy-btn square/>')
        ->assertSee('btn-square');
});

it('can render with size outline color attribute', function () {
    $this
        ->blade('<x-lazy-btn lg outline primary/>')
        ->assertSee('btn-lg')
        ->assertSee('btn-outline')
        ->assertSee('btn-primary');
});

it('can render with link attribute', function () {
    $this
        ->blade('<x-lazy-btn href="https://google.com" label="Go"/>')
        ->assertSee('href="https://google.com"', false)
        ->assertSee('btn', false)
        ->assertSee('Go')
        ->assertSee('<a', false);
});
