<?php

namespace DesignPatterns\DecoratorPattern\Tests;

use DesignPatterns\DecoratorPattern\Beverages\AbstractBeverage;
use DesignPatterns\DecoratorPattern\Beverages\Espresso;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class BeverageTest extends TestCase
{
    public static function dataProvider()
    {
        return [
            [new Espresso(), 'Espresso', 1.99],
        ];
    }

    #[Test]
    #[DataProvider('dataProvider')]
    public function it_gives_expected_values(
        AbstractBeverage $beverage,
        string $expectedDescription,
        float $expectedPrice
    ): void {
        self::assertEquals($expectedDescription, $beverage->getDescription());
        self::assertEquals($expectedPrice, $beverage->getCost());
    }
}