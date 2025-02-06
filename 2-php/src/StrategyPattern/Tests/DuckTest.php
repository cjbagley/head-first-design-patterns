<?php

namespace DesignPatterns\StrategyPattern\Tests;

use DesignPatterns\StrategyPattern\Duck;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class DuckTest extends TestCase
{
    #[Test]
    public function ducks_quack(): void
    {
        $duck = new Duck();
        self::assertSame('quack', $duck->quack());
    }
}