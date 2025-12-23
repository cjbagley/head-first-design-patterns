<?php

declare(strict_types=1);

namespace DesignPatterns\AdapterPattern\Expanded\Tests;

use DesignPatterns\AdapterPattern\Expanded\EnumerationInterface;
use DesignPatterns\AdapterPattern\Expanded\EnumerationIterator;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class EnumerationIteratorTest extends TestCase
{
    #[Test]
    public function it_handles_hasNext(): void
    {
        $enumerator = $this->createMock(EnumerationInterface::class);
        $enumerator->expects($this->once())
            ->method('hasMoreElements')
            ->willReturn(true);

        $adapter = new EnumerationIterator($enumerator);

        $this->assertTrue($adapter->hasNext());
    }

    #[Test]
    public function it_handles_next(): void
    {
        $enumerator = $this->createMock(EnumerationInterface::class);
        $enumerator->expects($this->once())
            ->method('nextElement')
            ->willReturn(42);

        $adapter = new EnumerationIterator($enumerator);

        $this->assertSame(42, $adapter->next());
    }

    #[Test]
    public function it_throws_exception_on_remove(): void
    {
        $enumerator = $this->createStub(EnumerationInterface::class);
        $adapter = new EnumerationIterator($enumerator);

        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Not supported');

        $adapter->remove();
    }
}
