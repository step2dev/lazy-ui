<?php

namespace Step2dev\LazyUI\Commands;

use Illuminate\Console\Command;
use function Laravel\Prompts\confirm;

class LazyInstallCommand extends Command
{
    public $signature = 'lazy-ui:install-package';

    public $description = 'My command';

    public function handle(): int
    {
        if (confirm(
            label: 'Do you want to install npm dependency?',
            default: true,
            hint: 'This will install all the npm dependencies for lazy-ui'
        )) {
            $packages = [
                '-D tailwindcss postcss autoprefixer sass',
                '-D daisyui@latest',
                'axios',
                'quill',
                'sanitize-html',
                'theme-change',
                'alpinejs',
            ];

            foreach ($packages as $package) {
                $this->info('Run command "npm i '.$package.'"');
                shell_exec('npm i '.$package);
            }
        }

        if (confirm(
            label: 'Do you want initialize tailwindcss?',
            default: true,
            hint: 'This will initialize tailwindcss'
        )) {
            $this->info('Run command "npm i npx tailwindcss init"');
            shell_exec('npx tailwindcss init');
        }

        return self::SUCCESS;
    }
}
