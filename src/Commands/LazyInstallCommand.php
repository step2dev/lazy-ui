<?php

namespace Step2dev\LazyUI\Commands;

use Illuminate\Console\Command;
use RuntimeException;

use function Laravel\Prompts\confirm;
use function Laravel\Prompts\info;

class LazyInstallCommand extends Command
{
    public $signature = 'lazy-ui:install-package';

    public $description = 'Install Lazy UI frontend dependencies and Tailwind CSS 4 configuration';

    public function handle(): int
    {
        if (confirm(
            label: 'Do you want to install npm dependencies?',
            default: true,
            hint: 'This will install the frontend dependencies required by Lazy UI 2.x'
        )) {
            $packages = [
                '-D tailwindcss@^4 @tailwindcss/postcss@^4 postcss daisyui@^5 @tailwindcss/forms',
                'axios',
                'quill@^2.0.3',
                'sanitize-html',
                'alpinejs',
            ];

            foreach ($packages as $package) {
                $this->info('Run command "npm i '.$package.'"');
                shell_exec('npm i '.$package);
            }
        }

        if (! file_exists(base_path('postcss.config.js'))) {
            info('Copy Tailwind CSS 4 PostCSS config');
            copy(__DIR__.'/../../stubs/postcss.config.js', base_path('postcss.config.js'));
        }

        if (! file_exists(base_path('resources/css/lazy.css'))) {
            info('Copy Lazy UI CSS entrypoint');
            $this->copy(__DIR__.'/../../stubs/css/lazy.css', base_path('resources/css/lazy.css'));
        }

        if (! file_exists(base_path('resources/js/lazy.js'))) {
            info('Copy Lazy UI JavaScript entrypoint');
            $this->copy(__DIR__.'/../../stubs/js/lazy.js', base_path('resources/js/lazy.js'));
        }

        return self::SUCCESS;
    }

    public function copy(string $from, string $to): void
    {
        $concurrentDirectory = dirname($to);

        if (! is_dir($concurrentDirectory) && ! mkdir($concurrentDirectory, 0755, true) && ! is_dir($concurrentDirectory)) {
            throw new RuntimeException(sprintf('Directory "%s" was not created', $concurrentDirectory));
        }

        copy($from, $to);
    }
}
