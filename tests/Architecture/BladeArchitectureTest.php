<?php

namespace Step2dev\LazyUI\Tests\Architecture;

it('keeps Blade templates presentation only', function () {
    $root = dirname(__DIR__, 2).'/resources/views';
    $iterator = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($root));
    $violations = [];

    foreach ($iterator as $file) {
        if (! $file->isFile() || ! str_ends_with($file->getFilename(), '.blade.php')) {
            continue;
        }

        $source = file_get_contents($file->getPathname());
        $relative = str_replace($root.'/', '', $file->getPathname());

        $patterns = [
            '@php block' => '/@php\b/',
            'PHP match expression' => '/\bmatch\s*\(/',
            'unstyled ternary' => '/\$unstyled\s*\?/',
            'conditional @class with unstyled' => '/@class\s*\([^)]*\$unstyled/s',
            'attribute class mapping with unstyled' => '/->class\s*\(\s*\[[^\]]*\$unstyled/s',
        ];

        foreach ($patterns as $name => $pattern) {
            if (preg_match($pattern, $source) === 1) {
                $violations[] = $relative.': '.$name;
            }
        }
    }

    expect($violations)->toBe([]);
});
