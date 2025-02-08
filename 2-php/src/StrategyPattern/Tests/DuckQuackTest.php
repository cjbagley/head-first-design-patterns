<?php

declare(strict_types=1);

namespace DesignPatterns\StrategyPattern\Tests;

use DesignPatterns\StrategyPattern\Behaviour\Quacks\QuackBehaviourInterface;
use DesignPatterns\StrategyPattern\Ducks\DecoyDuck;
use DesignPatterns\StrategyPattern\Ducks\MallardDuck;
use DesignPatterns\StrategyPattern\Ducks\RedheadDuck;
use DesignPatterns\StrategyPattern\Ducks\RubberDuck;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class DuckQuackTest extends TestCase
{
    public static function dataProvider(): array
    {
        return [
            [new MallardDuck(), 'quack'],
            [new RubberDuck(), 'squeak'],
            [new RedheadDuck(), 'moo'],
            [new DecoyDuck(), 'fake quack'],
        ];
    }

    #[DataProvider('dataProvider')]
    public function test_quack_behaviour(QuackBehaviourInterface $duck, $expected): void
    {
        self::assertSame($duck->quack(), $expected);
    }
}