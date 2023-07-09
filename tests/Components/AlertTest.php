<?php

namespace Lazyadm\LazyComponent\Tests\Components;

use Lazyadm\LazyComponent\Components\Alert;
use PHPUnit\Framework\TestCase;

class AlertTest extends TestCase
{
    public function testAlert(): void
    {
        $alert = new Alert();

        $this->assertIsArray($alert->allowedSizes(), 'Alert should have an array of allowed sizes');
        $this->assertIsArray($alert->allowedColors(), 'Alert should have an array of allowed colors');
    }
}
