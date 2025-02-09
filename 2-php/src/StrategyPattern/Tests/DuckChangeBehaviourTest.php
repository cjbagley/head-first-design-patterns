<?php

use DesignPatterns\StrategyPattern\Behaviour\Fly\FlyWithRocket;
use DesignPatterns\StrategyPattern\Behaviour\Quack\Squeak;
use DesignPatterns\StrategyPattern\Ducks\MallardDuck;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class DuckChangeBehaviourTest extends TestCase
{
    #[Test]
    public function behaviour_can_be_changed(): void
    {
        // Original
        $mallard = new MallardDuck();
        self::assertSame('quack', $mallard->quack());
        self::assertStringContainsString('fly with wings', $mallard->fly());

        // Changed
        $mallard->setQuackBehaviour(new Squeak());
        self::assertSame('squeak', $mallard->quack());
        $mallard->setFlyBehaviour(new FlyWithRocket());
        self::assertStringContainsString('fly with a rocket', $mallard->fly());
    }
}