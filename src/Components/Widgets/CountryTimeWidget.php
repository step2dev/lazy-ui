<?php

namespace Step2dev\LazyUI\Components\Widgets;

use Carbon\Carbon;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\App;
use Illuminate\View\Component;

class CountryTimeWidget extends Component
{
    private readonly string $uniqid;

    private readonly Carbon $timestamp;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(private readonly ?string $timezone = 'Etc/GMT', private readonly ?string $title = null)
    {
        $this->uniqid = uniqid($this->timezone, true);
        Carbon::setLocale(App::getLocale());
        $this->timestamp = now($timezone);

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): Factory|View
    {
        return view('lazy::widget.country-time-widget', [
            'timezone' => $this->timezone,
            'uniqid' => $this->uniqid,
            'title' => $this->title,
            'timestamp' => $this->timestamp,
        ]);
    }
}
