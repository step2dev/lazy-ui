<?php

namespace Lazyadm\LazyComponent\Components\Native;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NativeInput extends Component
{
    public ?string $placeholder;

    public function __construct(?string $placeholder = null, public bool $hasError = false)
    {
        $this->placeholder = (string) str($placeholder)->trim()->ucfirst();
    }

    public function render(): View
    {
        return view('lazy::native.input');
    }
}
