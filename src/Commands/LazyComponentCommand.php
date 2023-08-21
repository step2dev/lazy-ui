<?php

namespace Step2dev\LazyUI\Commands;

use Illuminate\Console\Command;

class LazyComponentCommand extends Command
{
    public $signature = 'lazy-component';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
