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

class DuckQuackTest extends TestCase
{
    /**
     * @return array<string, array{0: AbstractDuck, 1: string}>
     */
    public static function dataProvider(): array
    {
        return [
            'Mallard Duck' => [new MallardDuck(), 'quack'],
            'Rubber Duck' => [new RubberDuck(), 'squeak'],
            'Redhead Duck' => [new RedheadDuck(), 'quack'],
            'Decoy Duck' => [new DecoyDuck(), '<< silence >>'],
        ];
    }

    #[DataProvider('dataProvider')]
    public function test_quack_behaviour(AbstractDuck $duck, string $expected): void
    {
        self::assertSame($duck->performQuack(), $expected);
    }
}
