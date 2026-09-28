<?php

namespace Step2dev\LazyUI\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Step2dev\LazyUI\LazyComponent;

class Menu extends LazyComponent
{
    public string|int $countLabel;
    public string $resolvedHref;
    public bool $isActive;

    public function __construct(
        public string $route = '',
        public string $href = '#',
        public string $icon = '',
        public string $label = '',
        public string $title = '',
        public bool $show = true,
        public string|int $count = 0,
        public string $inlineIcon = '',
        public mixed $indicator = '',
        public bool $toggle = false,
        public bool $active = false,
        public bool $disabled = false,
        public bool $focus = false,
        public bool $join = true,
    ) {
        $routePath = $this->route ? route($this->route, [], false) : $this->href;
        $path = trim($routePath !== '/admin' ? $routePath.'*' : $routePath, '/');

        $this->resolvedHref = $this->route ? route($this->route) : $this->href;
        $this->countLabel = (int) $this->count > 99 ? '99+' : $this->count;
        $this->isActive = $this->active || request()->is($path);
    }

    public function render(): View|Closure
    {
        return function (array $data) {
            if (! $this->show) {
                return '';
            }

            return view('lazy::menu', $this->mergeData($data, [
                'menu-active' => $this->isActive,
                'menu-disabled' => $this->disabled,
                'menu-focus' => $this->focus,
                'menu-dropdown-toggle' => $this->toggle,
            ]))->render();
        };
    }
}
