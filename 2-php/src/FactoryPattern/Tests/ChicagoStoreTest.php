<?php

declare(strict_types=1);

namespace DesignPatterns\FactoryPattern\Tests;

use DesignPatterns\FactoryPattern\Store\AbstractPizzaStore;
use DesignPatterns\FactoryPattern\Store\ChicagoPizzaStore;
use Generator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class ChicagoStoreTest extends TestCase
{
    private AbstractPizzaStore $pizzaStore;

    protected function setUp(): void
    {
        $this->pizzaStore = new ChicagoPizzaStore();
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
        self::assertStringContainsString('chicago', strtolower($pizza->getName()));
        self::assertStringContainsString(strtolower($order), strtolower($pizza->getName()));
    }
}
