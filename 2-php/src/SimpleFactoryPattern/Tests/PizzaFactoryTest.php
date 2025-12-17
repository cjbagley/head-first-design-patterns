<?php

declare(strict_types=1);

namespace DesignPatterns\SimpleFactoryPattern\Tests;

use DesignPatterns\SimpleFactoryPattern\Pizza\ClamPizza;
use DesignPatterns\SimpleFactoryPattern\Pizza\MargaritaPizza;
use DesignPatterns\SimpleFactoryPattern\Pizza\PepperoniPizza;
use DesignPatterns\SimpleFactoryPattern\Pizza\VeggiePizza;
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
        yield ['margarita', MargaritaPizza::class];
        yield ['pepperoni', PepperoniPizza::class];
        yield ['veggie', VeggiePizza::class];
        yield ['clam', ClamPizza::class];
    }

    #[DataProvider('dataProvider')]
    #[Test]
    public function it_creates_correct_pizza(string $order, string $expectedClass): void
    {
        $pizza = $this->pizzaStore->orderPizza($order);

        self::assertinstanceOf($expectedClass, $pizza);
        self::assertStringContainsString($order, strtolower($pizza->getDescription()));
    }
}
