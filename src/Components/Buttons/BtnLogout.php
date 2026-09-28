<?php

namespace Step2dev\LazyUI\Components\Buttons;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BtnLogout extends Component
{
    public string $target;

    public function __construct(
        public string $icon = '',
        public ?string $action = null,
        public string $route = 'logout',
    ) {
        $this->target = $this->action
            ?? (app('router')->has($this->route) ? route($this->route) : '#');
    }

    public function render(): View
    {
        return view('lazy::btn.logout');
    }
}
