<?php

declare(strict_types=1);

namespace DesignPatterns\AdapterPattern\Simple;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class TurkeyAdaptorTest extends TestCase
{
    #[Test]
    public function it_handles_duck_quack(): void
    {
        $turkeyMock = $this->createMock(TurkeyInterface::class);
        
        $turkeyMock->expects($this->once())
            ->method('gobble')
            ->willReturn('Gobble gobble');

        $adapter = new TurkeyAdaptor($turkeyMock);

        $this->assertSame('Gobble gobble', $adapter->quack());
    }

    #[Test]
    public function it_handles_duck_fly(): void
    {
        $turkeyMock = $this->createMock(TurkeyInterface::class);
        
        $turkeyMock->expects($this->exactly(5))
            ->method('fly')
            ->willReturn('flap');

        $adapter = new TurkeyAdaptor($turkeyMock);

        $expectedOutput = 'flap flap flap flap flap';
        $this->assertSame($expectedOutput, trim($adapter->fly()));
    }

    #[Test]
    public function it_handle_concrete_object(): void
    {
        $wildTurkey = new WildTurkey();
        $adapter = new TurkeyAdaptor($wildTurkey);

        $this->assertSame('Gobble gobble', $adapter->quack());
        
        $expectedFly = trim(str_repeat('flap ', 5));
        $this->assertSame($expectedFly, $adapter->fly());
    }
}
