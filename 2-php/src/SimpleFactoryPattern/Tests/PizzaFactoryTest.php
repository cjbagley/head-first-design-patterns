<?php

declare(strict_types=1);

namespace DesignPatterns\SimpleFactoryPattern\Tests;

use DesignPatterns\SimpleFactoryPattern\PizzaFactory;
use DesignPatterns\SimpleFactoryPattern\PizzaStore;
use Generator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class PizzaFactoryTest extends TestCase
{
    private PizzaStore $pizzaStore;

    protected function setUp(): void
    {
        $this->pizzaStore = new PizzaStore(new PizzaFactory());
    }

    /**
     * @return \Generator<array<int, string>>
     */
    public static function dataProvider(): Generator
    {
        yield ['margarita'];
        yield ['pepperoni'];
        yield ['veggie'];
        yield ['clam'];
    }

    #[DataProvider('dataProvider')]
    #[Test]
    public function it_creates_correct_pizza(string $order): void
    {
        $pizza = $this->pizzaStore->orderPizza($order);
        self::assertStringContainsString($order, strtolower($pizza->getDescription()));
    }
}
