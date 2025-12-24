<?php

declare(strict_types=1);

namespace DesignPatterns\TemplateMethodPattern\Tests;

use DesignPatterns\TemplateMethodPattern\Coffee;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class CoffeeTest extends TestCase
{
    #[Test]
    public function it_prepares_expected_recipe(): void
    {
        $coffee = new Coffee();
        $expected = implode("\n", [
            'Boiling water',
            'Dripping Coffee through filter',
            'Pouring into cup',
            'Adding Sugar and Milk',
        ]);

        $this->assertSame($expected, $coffee->prepareRecipe());
    }
}
