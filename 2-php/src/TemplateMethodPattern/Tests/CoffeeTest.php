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
        $recipe = $coffee->prepareRecipe();

        $this->assertStringContainsString('Boiling water', $recipe);
        $this->assertStringContainsString('Dripping Coffee through filter', $recipe);
        $this->assertStringContainsString('Pouring into cup', $recipe);
        $this->assertStringContainsString('Adding Sugar and Milk', $recipe);

        // Check the hook works as expected:
        $pattern = '/Special blend for today is: (House blend|Espresso blend|Breakfast blend|Italian Roasts blend)/';
        $this->assertMatchesRegularExpression($pattern, $recipe);
    }
}
