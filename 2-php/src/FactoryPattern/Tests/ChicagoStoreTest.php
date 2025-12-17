<?php

declare(strict_types=1);

namespace DesignPatterns\FactoryPattern\Tests;

use DesignPatterns\FactoryPattern\Pizza\ChicagoStyleClamPizza;
use DesignPatterns\FactoryPattern\Pizza\ChicagoStyleMargaritaPizza;
use DesignPatterns\FactoryPattern\Pizza\ChicagoStylePepperoniPizza;
use DesignPatterns\FactoryPattern\Pizza\ChicagoStyleVeggiePizza;
use DesignPatterns\FactoryPattern\Store\AbstractPizzaStore;
use DesignPatterns\FactoryPattern\Store\ChicagoPizzaStore;
use DesignPatterns\FactoryPattern\Store\Order;
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
        yield [Order::Cheese, ChicagoStyleMargaritaPizza::class];
        yield [Order::Pepperoni, ChicagoStylePepperoniPizza::class];
        yield [Order::Veggie, ChicagoStyleVeggiePizza::class];
        yield [Order::Clam, ChicagoStyleClamPizza::class];
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
