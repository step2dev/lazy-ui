<?php

namespace Step2dev\LazyUI\Tests\Performance;

it('preserves user classes and framework attributes', function () {
    $this
        ->blade('<x-lazy-btn class="custom-button" data-user="yes" aria-label="Custom button" wire:key="custom-button">Go</x-lazy-btn>')
        ->assertSee('custom-button')
        ->assertSee('data-user="yes"', false)
        ->assertSee('aria-label="Custom button"', false)
        ->assertSee('wire:key="custom-button"', false);
});

it('supports unstyled components without losing user classes', function () {
    $this
        ->blade('<x-lazy-btn unstyled class="custom-button">Go</x-lazy-btn>')
        ->assertSee('class="custom-button"', false)
        ->assertDontSee('btn-primary')
        ->assertDontSee('btn-lg');

    $this
        ->blade('<x-lazy-input unstyled class="custom-input" />')
        ->assertSee('class="custom-input"', false)
        ->assertDontSee('input-primary')
        ->assertDontSee('input-lg');
});

it('does not cache rendered component attributes between renders', function () {
    $this
        ->blade('<x-lazy-btn primary class="first-render">First</x-lazy-btn>')
        ->assertSee('btn-primary')
        ->assertSee('first-render');

    $this
        ->blade('<x-lazy-btn unstyled class="second-render">Second</x-lazy-btn>')
        ->assertSee('class="second-render"', false)
        ->assertDontSee('btn-primary')
        ->assertDontSee('first-render');
});

it('passes theme configuration as view data instead of html attributes', function () {
    config()->set('lazy.themes.theme_toggle', 'toggle');
    config()->set('lazy.themes.toggle_themes', ['light', 'dark']);
    config()->set('lazy.themes.themes', ['light', 'dark', 'business']);

    $this
        ->blade('<x-lazy-theme-switcher />')
        ->assertSee('data-toggle-theme="light,dark"', false)
        ->assertDontSee('toggleThemes=', false)
        ->assertDontSee('themes=', false);
});

it('keeps logout on the Lazy UI button styling contract without javascript', function () {
    $this
        ->blade('<x-lazy-btn-logout primary class="custom-logout" />')
        ->assertSee('class="btn', false)
        ->assertSee('btn-primary')
        ->assertSee('custom-logout')
        ->assertSee('method="POST"', false)
        ->assertDontSee('class="logout"', false);
});
