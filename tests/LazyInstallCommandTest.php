<?php

it('does not install a standalone Alpine runtime', function () {
    $installer = file_get_contents(__DIR__.'/../src/Commands/LazyInstallCommand.php');

    expect($installer)->not->toContain("'alpinejs'");
});
