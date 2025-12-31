<?php

declare(strict_types=1);

namespace DesignPatterns\ProxyPattern\Test;

use DesignPatterns\ProxyPattern\GumballMachineProxy;
use DesignPatterns\ProxyPattern\GumballMonitor;
use Generator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class GumballMonitorTest extends TestCase
{
    /**
     * @return Generator<array<string, int>>
     */
    public static function dataProvider(): Generator
    {
        yield ['Lincoln', 40];
        yield ['New York', 20];
        yield ['Cork', 15];
        yield ['London', 10];
    }

    #[DataProvider('dataProvider')]
    #[Test]
    public function it_calls_proxied_object($locationUrl, $expectedCount): void
    {
        $gumballMachine = new GumballMachineProxy($locationUrl);
        $gumballMonitor = new GumballMonitor($gumballMachine);
        $report = $gumballMonitor->report();

        $this->assertStringContainsString(sprintf('(API call for location: %s)', $locationUrl), $report);
        $this->assertStringContainsString(sprintf('Current Inventory: %d', $expectedCount), $report);
    }
}
