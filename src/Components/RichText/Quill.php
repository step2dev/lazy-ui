<?php

namespace Lazyadm\LazyComponent\Components\RichText;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Quill extends Component
{
    public function render(): View
    {
        return view('lazy::rich-text.quill');
    }
}
