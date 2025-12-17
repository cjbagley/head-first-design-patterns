<?php

declare(strict_types=1);

namespace DesignPatterns\FactoryPattern\Tests;

use DesignPatterns\FactoryPattern\Pizza\NYStyleClamPizza;
use DesignPatterns\FactoryPattern\Pizza\NYStyleMargaritaPizza;
use DesignPatterns\FactoryPattern\Pizza\NYStylePepperoniPizza;
use DesignPatterns\FactoryPattern\Pizza\NYStyleVeggiePizza;
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

    /**
     * @return \Generator<array<int, string>>
     */
    public static function dataProvider(): Generator
    {
        yield ['margarita', NYStyleMargaritaPizza::class];
        yield ['pepperoni', NYStylePepperoniPizza::class];
        yield ['veggie', NYStyleVeggiePizza::class];
        yield ['clam', NYStyleClamPizza::class];
    }

    #[DataProvider('dataProvider')]
    #[Test]
    public function it_creates_correct_pizza(string $order, string $expectedClass): void
    {
        $pizza = $this->pizzaStore->orderPizza($order);
        self::assertInstanceOf($expectedClass, $pizza);
        self::assertStringContainsString('new york style', strtolower($pizza->getName()));
        self::assertStringContainsString(strtolower($order), strtolower($pizza->getName()));
    }
}
