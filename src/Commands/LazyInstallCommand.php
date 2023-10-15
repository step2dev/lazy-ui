<?php

namespace Step2dev\LazyUI\Commands;

use Illuminate\Console\Command;

use RuntimeException;
use function Laravel\Prompts\confirm;
use function Laravel\Prompts\info;
use function Laravel\Prompts\select;

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
                '-D @tailwindcss/forms',
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
            info('Run command "npm i npx tailwindcss init"');
            shell_exec('npx tailwindcss init');
        }

        if (! file_exists(base_path('postcss.config.js'))) {
            info('Copy postcss.config.js');
            copy(__DIR__.'/../../stubs/postcss.config.js', base_path('postcss.config.js'));
        }

        if (! file_exists(base_path('resources/scss/lazy.scss'))) {
            info('Copy lazy.scss');
            $this->copy(__DIR__.'/../../stubs/scss/lazy.scss', base_path('resources/scss/lazy.scss'));
        }

        if (! file_exists(base_path('resources/js/lazy.js'))) {
            info('Copy lazy.js');
            $this->copy(__DIR__.'/../../stubs/js/lazy.js', base_path('resources/js/lazy.js'));
        }

        $select = select(
            label: 'What type config do you want to use?',
            options: [
                'tailwind.config.js' => 'tailwind.config.js',
                'tailwind.lazy.config.js' => 'tailwind.lazy.config.js If you use tailwindcss on site, you can use this config',
                'ignore' => 'Ignore',
            ],
            default: 'tailwind.lazy.config.js',
        );

        if ($select === 'ignore') {
            return self::SUCCESS;
        }

        if ($select === 'tailwind.config.js') {
            info('Copy tailwind.config.js');
            copy(__DIR__.'/../../stubs/tailwind.config.js', base_path('tailwind.config.js'));
        }

        if ($select === 'tailwind.lazy.config.js') {
            info('Copy tailwind.lazy.config.js');

            copy(__DIR__.'/../../stubs/tailwind.lazy.config.js', base_path('tailwind.lazy.config.js'));

            info('use @config "path to file/tailwind.admin.config.js" in your css file');
        }

        return self::SUCCESS;
    }

    public function copy(string $from, string $to): void
    {
        if (! mkdir($concurrentDirectory = dirname($to), 0755, true) && ! is_dir($concurrentDirectory)) {
            throw new RuntimeException(sprintf('Directory "%s" was not created', $concurrentDirectory));
        }

        copy($from, $to);
    }
}
