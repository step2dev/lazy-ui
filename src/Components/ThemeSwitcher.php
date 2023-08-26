<?php

namespace Step2dev\LazyUI\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Step2dev\LazyUI\LazyComponent;

class ThemeSwitcher extends LazyComponent
{
    public function render(): Closure|View
    {
        return function (array $data) {
            $data['attributes']['themeToggle'] = config('lazy/themes.theme_toggle');
            $data['attributes']['toggleThemes'] = config('lazy/themes.toggle_themes');
            $data['attributes']['themes'] = config('lazy/themes.themes');

            return view('lazy::themeswitcher', $this->mergeData($data))->render();
        };
    }
}
