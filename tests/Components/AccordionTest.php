<?php

namespace Lazyadm\LazyComponent\Tests\Components;

use Lazyadm\LazyComponent\Components\Accordion;
use PHPUnit\Framework\TestCase;

class AccordionTest extends TestCase
{

    public function testAccordion(): void
    {
        $accordion = new Accordion();

        $this->assertIsArray($accordion->allowedSizes(), 'Accordion should have an array of allowed sizes');
        $this->assertIsArray($accordion->allowedColors(), 'Accordion should have an array of allowed colors');
    }
}
