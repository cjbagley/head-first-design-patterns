<?php

declare(strict_types=1);

namespace DesignPatterns\TemplateMethodPattern\Tests;

use DesignPatterns\TemplateMethodPattern\Tea;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class TeaTest extends TestCase
{
    #[Test]
    public function it_prepares_expected_recipe(): void
    {
        $coffee = new Tea();
        $expected = implode("\n", [
            'Boiling water',
            'Steeping tea bag',
            'Pouring into cup',
            'Adding lemon',
        ]);

        $this->assertSame($expected, $coffee->prepareRecipe());
    }
}
