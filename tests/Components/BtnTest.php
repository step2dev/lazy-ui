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
        ->assertSee('wire:loading.class="btn-disabled loading loading-spinner"', false)
        ->assertSee('wire:loading.attr="disabled"', false)
        ->assertSee('Go');
});

it('can render button without attribute label', function () {
    $this
        ->blade('<x-lazy-btn>Go</x-lazy-btn>')
        ->assertSee('type="submit"', false)
        ->assertSee('class="btn', false)
        ->assertSee('wire:loading.class="btn-disabled loading loading-spinner"', false)
        ->assertSee('wire:loading.attr="disabled"', false)
        ->assertSee('Go');
});

it('can render with colors attribute', function ($color, $class) {
    $this
        ->blade("<x-lazy-btn {$color} />")
        ->assertSee('class="btn', false)
        ->assertSee('wire:loading.class="btn-disabled loading loading-spinner"', false)
        ->assertSee('wire:loading.attr="disabled"', false)
        ->assertSee($class);

    $this
        ->blade("<x-lazy-btn color='{$color}'>Go</x-lazy-btn>")
        ->assertSee('class="btn', false)
        ->assertSee('wire:loading.class="btn-disabled loading loading-spinner"', false)
        ->assertSee('wire:loading.attr="disabled"', false)
        ->assertSee($class);
})->with([
    'primary' => ['primary', 'btn-primary'],
    'secondary' => ['secondary', 'btn-secondary'],
    'accent' => ['accent', 'btn-accent'],
    'info' => ['info', 'btn-info'],
    'success' => ['success', 'btn-success'],
    'warning' => ['warning', 'btn-warning'],
    'error' => ['error', 'btn-error'],
    'ghost' => ['ghost', 'btn-ghost'],
    'link' => ['link', 'btn-link'],
]);

it('can render with sizes attribute', function ($size, $class) {
    $this
        ->blade("<x-lazy-btn {$size} />")
        ->assertSee($class);

    $this->blade("<x-lazy-btn size='{$size}'>Go</x-lazy-btn>")
        ->assertSee($class);
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

it('can render with size outline color attribute', function ($color, $class) {
    $this
        ->blade("<x-lazy-btn lg outline {$color}/>")
        ->assertSee('btn-lg')
        ->assertSee('btn-outline')
        ->assertSee($class);
})->with([
    'primary' => ['primary', 'btn-primary'],
    'secondary' => ['secondary', 'btn-secondary'],
    'accent' => ['accent', 'btn-accent'],
    'info' => ['info', 'btn-info'],
    'success' => ['success', 'btn-success'],
    'warning' => ['warning', 'btn-warning'],
    'error' => ['error', 'btn-error'],
    'ghost' => ['ghost', 'btn-ghost'],
    'link' => ['link', 'btn-link'],
]);

it('can render with link attribute', function () {
    $this
        ->blade('<x-lazy-btn href="https://google.com" label="Go"/>')
        ->assertSee('href="https://google.com"', false)
        ->assertSee('btn', false)
        ->assertSee('Go')
        ->assertSee('<a', false);
});
