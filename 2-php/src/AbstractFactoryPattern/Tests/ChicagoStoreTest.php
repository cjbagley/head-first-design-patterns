<?php

declare(strict_types=1);

namespace DesignPatterns\AbstractFactoryPattern\Tests;

use DesignPatterns\AbstractFactoryPattern\Pizza\CheesePizza;
use DesignPatterns\AbstractFactoryPattern\Pizza\ClamPizza;
use DesignPatterns\AbstractFactoryPattern\Pizza\PepperoniPizza;
use DesignPatterns\AbstractFactoryPattern\Pizza\VegetablePizza;
use DesignPatterns\AbstractFactoryPattern\Store\AbstractPizzaStore;
use DesignPatterns\AbstractFactoryPattern\Store\ChicagoPizzaStore;
use DesignPatterns\AbstractFactoryPattern\Store\Order;
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

    /**
     * @return \Generator<array<int, string>>
     */
    public static function dataProvider(): Generator
    {
        yield [Order::Cheese, CheesePizza::class];
        yield [Order::Pepperoni, PepperoniPizza::class];
        yield [Order::Veggie, VegetablePizza::class];
        yield [Order::Clam, ClamPizza::class];
    }

    #[DataProvider('dataProvider')]
    #[Test]
    public function it_creates_correct_pizza(Order $order, string $expectedClass): void
    {
        $pizza = $this->pizzaStore->orderPizza($order);
        self::assertInstanceOf($expectedClass, $pizza);
        self::assertStringContainsString('chicago', strtolower($pizza->getName()));
    }
}
