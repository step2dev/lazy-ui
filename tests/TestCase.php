<?php

namespace Step2dev\LazyUI\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Foundation\Testing\Concerns\InteractsWithViews;
use Orchestra\Testbench\TestCase as Orchestra;
use Step2dev\LazyUI\LazyUiServiceProvider;

class TestCase extends Orchestra
{
    use InteractsWithViews { blade as frameworkBlade; }

    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Step2dev\\LazyUI\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function blade(string $template, $data = [])
    {
        $bufferLevel = ob_get_level();

        try {
            return $this->frameworkBlade($template, $data);
        } finally {
            if (str_contains($template, '<x-slot:')) {
                while (ob_get_level() > $bufferLevel) {
                    ob_end_clean();
                }
            }
        }
    }

    protected function getPackageProviders($app)
    {
        return [
            LazyUiServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        // config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_lazy-component_table.php.stub';
        $migration->up();
        */
    }
}
