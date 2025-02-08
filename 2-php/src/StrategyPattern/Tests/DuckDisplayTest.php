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

class DuckDisplayTest extends TestCase
{
    public static function dataProvider(): array
    {
        return [
            [new MallardDuck(), 'real mallard duck'],
            [new RubberDuck(), 'plastic rubber duck'],
            [new RedheadDuck(), 'real redhead duck'],
            [new DecoyDuck(), 'wooden decoy duck'],
        ];
    }

    #[DataProvider('dataProvider')]
    public function test_for_correct_display_text(AbstractDuck $duck, $expected): void
    {
        self::assertStringContainsString(strtolower($expected), strtolower($duck->display()));
    }
}