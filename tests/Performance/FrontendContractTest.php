<?php

namespace Step2dev\LazyUI\Tests\Performance;

function packageFile(string $path): string
{
    return file_get_contents(dirname(__DIR__, 2).'/'.$path);
}

it('does not start Livewire from the Lazy UI application stub', function () {
    $source = packageFile('stubs/js/lazy.js');

    expect($source)
        ->not->toContain('Livewire.start(')
        ->not->toContain('import {Livewire')
        ->not->toContain('import { Livewire');
});

it('loads Quill dynamically instead of bundling it into the base javascript', function () {
    $source = packageFile('resources/js/components/quill.js');

    expect($source)
        ->toContain("import('quill')")
        ->not->toContain('import Quill from');
});

it('keeps Tailwind and daisyUI configuration in the application css entrypoint', function () {
    $packageCss = packageFile('resources/css/lazy.css');
    $applicationCss = packageFile('stubs/css/lazy.css');

    expect($packageCss)
        ->not->toContain('@import "tailwindcss"')
        ->not->toContain('@plugin "daisyui"')
        ->not->toContain('quill/dist/quill.snow.css');

    expect($applicationCss)
        ->toContain('@import "tailwindcss"')
        ->toContain('@plugin "daisyui"')
        ->toContain('@source "../../vendor/step2dev/lazy-ui/resources/views/**/*.blade.php"');
});

it('does not duplicate toast css inside the blade template', function () {
    expect(packageFile('resources/views/toast.blade.php'))
        ->not->toContain('<style>');
});

it('does not require javascript to submit logout', function () {
    expect(packageFile('resources/js/lazy.js'))
        ->not->toContain('./components/logout');

    expect(packageFile('resources/views/btn/logout.blade.php'))
        ->toContain('method="POST"')
        ->toContain('<x-lazy-btn')
        ->not->toContain('class="logout"')
        ->not->toContain('onclick=');
});

it('does not parse choice options from html with regex or use a host application view', function () {
    $component = packageFile('src/Components/Choices.php');

    expect($component)
        ->not->toContain('preg_match_all')
        ->not->toContain("view('components.admin.select'");
});
