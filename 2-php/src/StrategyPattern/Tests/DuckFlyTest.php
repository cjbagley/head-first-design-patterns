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

class DuckFlyTest extends TestCase
{
    public static function dataProvider(): array
    {
        return [
            [new MallardDuck(), 'fly with wings'],
            [new RubberDuck(), 'cannot fly'],
            [new RedheadDuck(), 'fly with wings'],
            [new DecoyDuck(), 'cannot fly'],
        ];
    }

    #[DataProvider('dataProvider')]
    public function test_fly_behaviour(QuackBehaviourInterface $duck, $expected): void
    {
        self::assertStringContainsString($expected, $duck->fly());
    }
}