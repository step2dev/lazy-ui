<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\Contracts\View\View;
use Step2dev\LazyUI\LazyComponent;

class ThemeSwitcher extends LazyComponent
{
    public function render(): View
    {
        return view('lazy::themeswitcher', [
            'themeToggle' => config('lazy.themes.theme_toggle', 'multiple'),
            'toggleThemes' => config('lazy.themes.toggle_themes', ['light', 'dark']),
            'themes' => config('lazy.themes.themes', []),
        ]);
    }
}
