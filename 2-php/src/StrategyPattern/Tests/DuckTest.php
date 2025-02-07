<?php

namespace DesignPatterns\StrategyPattern\Tests;

use DesignPatterns\StrategyPattern\Duck;
use DesignPatterns\StrategyPattern\MallardDuck;
use DesignPatterns\StrategyPattern\QuackableInterface;
use DesignPatterns\StrategyPattern\RubberDuck;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class DuckTest extends TestCase
{
    public static function dataProvider(): array
    {
        return [
            [new Duck(), 'quack'],
            [new MallardDuck(), 'quack'],
            [new RubberDuck(), 'squeak'],
        ];
    }

    #[DataProvider('dataProvider')]
    public function test_quack_behaviour(QuackableInterface $duck, $expected): void
    {
        self::assertSame($expected, $duck->quack());
    }
}