<?php

declare(strict_types=1);

namespace DesignPatterns\FactoryPattern\Tests;

use DesignPatterns\FactoryPattern\Store\AbstractPizzaStore;
use DesignPatterns\FactoryPattern\Store\NYPizzaStore;
use Generator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class NYStoreTest extends TestCase
{
    private AbstractPizzaStore $pizzaStore;

    protected function setUp(): void
    {
        $this->pizzaStore = new NYPizzaStore();
    }

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
        self::assertStringContainsString('new york style', strtolower($pizza->getName()));
        self::assertStringContainsString(strtolower($order), strtolower($pizza->getName()));
    }
}
