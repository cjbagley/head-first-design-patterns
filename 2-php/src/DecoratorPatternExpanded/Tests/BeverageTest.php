<?php

namespace DesignPatterns\DecoratorPatternExpanded\Tests;

use DesignPatterns\DecoratorPatternExpanded\Beverages\Beverage;
use DesignPatterns\DecoratorPatternExpanded\Beverages\DarkRoast;
use DesignPatterns\DecoratorPatternExpanded\Beverages\Decaf;
use DesignPatterns\DecoratorPatternExpanded\Beverages\Espresso;
use DesignPatterns\DecoratorPatternExpanded\Beverages\HouseBlend;
use DesignPatterns\DecoratorPatternExpanded\Condiments\Mocha;
use DesignPatterns\DecoratorPatternExpanded\Condiments\SteamedMilk;
use DesignPatterns\DecoratorPatternExpanded\Condiments\Whip;
use DesignPatterns\DecoratorPatternExpanded\Size;
use Iterator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class BeverageTest extends TestCase
{
    /**
     * @return \Iterator<array<array<int, mixed>, mixed>>
     */
    public static function dataProvider(): Iterator
    {
        // Base Tests
        yield [new Espresso(), 'Espresso - Tall', 199];
        yield [new HouseBlend(), 'House Blend - Tall', 89];
        yield [new DarkRoast(), 'Dark Roast - Tall', 99];
        yield [new Decaf(), 'Decaf - Tall', 105];
        yield [new Mocha(new DarkRoast()), 'Dark Roast - Tall - Mocha', 119];

        // Decorator Tests
        $houseBlend = new HouseBlend();
        $houseBlend = new SteamedMilk($houseBlend);
        $houseBlend = new Whip($houseBlend);
        yield [$houseBlend, 'House Blend - Tall - Steamed Milk - Whip', 109];
        $decaf = new Decaf();
        $decaf = new Mocha($decaf);
        yield [$decaf, 'Decaf - Tall - Mocha', 125];

        // Size Tests
        $houseBlend = new HouseBlend();
        $houseBlend->setSize(Size::GRANDE);
        yield [$houseBlend, 'House Blend - Grande', 99];

        $espresso = new Espresso();
        $espresso->setSize(Size::VENTI);
        yield [$espresso, 'Espresso - Venti', 219];

        $ventiDecaff = new Decaf();
        $ventiDecaff->setSize(Size::VENTI);
        $ventiDecaff = new Mocha($ventiDecaff);
        yield [$ventiDecaff, 'Decaf - Venti - Mocha', 155];

        $houseBlend = new HouseBlend();
        $houseBlend->setSize(Size::GRANDE);
        $houseBlend = new SteamedMilk($houseBlend);
        $houseBlend = new Whip($houseBlend);
        yield [$houseBlend, 'House Blend - Grande - Steamed Milk - Whip', 129];
    }

    #[Test]
    #[DataProvider('dataProvider')]
    public function it_gives_expected_values(
        Beverage $beverage,
        string $expectedDescription,
        float $expectedPrice
    ): void {
        self::assertEquals($expectedDescription, $beverage->getDescription());
        self::assertEquals($expectedPrice, $beverage->getCost());
    }
}
