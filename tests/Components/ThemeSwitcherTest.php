<?php

namespace Step2dev\LazyUI\Tests\Components;

it('renders configured theme arrays without converting them to html attributes', function () {
    config()->set('lazy.themes.theme_toggle', 'multiple');
    config()->set('lazy.themes.toggle_themes', ['light', 'dark']);
    config()->set('lazy.themes.themes', ['light', 'dark', 'business']);

    $this->blade('<x-lazy-theme-switcher/>')
        ->assertSee('data-set-theme="light"', false)
        ->assertSee('data-set-theme="dark"', false)
        ->assertSee('data-set-theme="business"', false);
});
