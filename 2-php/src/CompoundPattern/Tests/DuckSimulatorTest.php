<?php

declare(strict_types=1);

namespace DesignPatterns\CompoundPattern\Tests;

use DesignPatterns\CompoundPattern\Decorator\QuackCounter;
use DesignPatterns\CompoundPattern\DuckSimulator;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class DuckSimulatorTest extends TestCase
{
    protected function setUp(): void
    {
        QuackCounter::resetNumberOfQuacks();
    }

    #[Test]
    public function it_simulates_ducks(): void
    {
        $duckSimulator = new DuckSimulator();

        $resultDto = $duckSimulator->simulateDucks();
        self::assertEquals("Quack\nQuack\nKwak\nSqueak\nHonk", $resultDto->getSimulateDucksOutput());
    }

    #[Test]
    public function it_counts_ducks_correctly(): void
    {
        $duckSimulator = new DuckSimulator();
        $resultDto = $duckSimulator->simulateDucks();

        // Note - Goose honk does not count, so number of quacks is one less
        self::assertEquals(5, $resultDto->getDuckCount());
        self::assertEquals(4, $resultDto->getNumberOfQuacks());
    }
}
