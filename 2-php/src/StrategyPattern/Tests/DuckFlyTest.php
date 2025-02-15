<?php

declare(strict_types=1);

namespace DesignPatterns\StrategyPattern\Tests;

use DesignPatterns\StrategyPattern\Ducks\AbstractDuck;
use DesignPatterns\StrategyPattern\Ducks\DecoyDuck;
use DesignPatterns\StrategyPattern\Ducks\MallardDuck;
use DesignPatterns\StrategyPattern\Ducks\RedheadDuck;
use DesignPatterns\StrategyPattern\Ducks\RubberDuck;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class DuckFlyTest extends TestCase
{
    /**
     * @return array<string, array{0: AbstractDuck, 1: string}>
     */
    public static function dataProvider(): array
    {
        return [
            'Mallard Duck' => [new MallardDuck(), 'fly with wings'],
            'Rubber Duck' => [new RubberDuck(), 'cannot fly'],
            'Redhead Duck' => [new RedheadDuck(), 'fly with wings'],
            'Decoy Duck' => [new DecoyDuck(), 'cannot fly'],
        ];
    }

    #[DataProvider('dataProvider')]
    public function test_fly_behaviour(AbstractDuck $duck, string $expected): void
    {
        self::assertStringContainsString($expected, $duck->fly());
    }
}
