<?php

namespace DesignPatterns\DecoratorPattern\Tests;

use DesignPatterns\DecoratorPattern\Beverages\BeverageInterface;
use DesignPatterns\DecoratorPattern\Beverages\DarkRoast;
use DesignPatterns\DecoratorPattern\Beverages\Decaf;
use DesignPatterns\DecoratorPattern\Beverages\Espresso;
use DesignPatterns\DecoratorPattern\Beverages\HouseBlend;
use DesignPatterns\DecoratorPattern\Condiments\Mocha;
use DesignPatterns\DecoratorPattern\Condiments\SteamedMilk;
use DesignPatterns\DecoratorPattern\Condiments\Whip;
use Iterator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class BeverageTest extends TestCase
{
    public static function dataProvider(): Iterator
    {
        yield [new Espresso(), 'Espresso', 199];
        yield [new HouseBlend(), 'House Blend', 89];
        yield [new DarkRoast(), 'Dark Roast', 99];
        yield [new Decaf(), 'Decaf', 105];
        yield [new Mocha(new DarkRoast()), 'Dark Roast - Mocha', 119];
        $houseBlend = new HouseBlend();
        $houseBlend = new SteamedMilk($houseBlend);
        $houseBlend = new Whip($houseBlend);
        yield [$houseBlend, 'House Blend - Steamed Milk - Whip', 109];
        $decaf = new Decaf();
        $decaf = new Mocha($decaf);
        yield [$decaf, 'Decaf - Mocha', 125];
    }

    #[Test]
    #[DataProvider('dataProvider')]
    public function it_gives_expected_values(
        BeverageInterface $beverage,
        string $expectedDescription,
        float $expectedPrice
    ): void {
        self::assertEquals($expectedDescription, $beverage->getDescription());
        self::assertEquals($expectedPrice, $beverage->getCost());
    }
}