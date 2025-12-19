<?php

declare(strict_types=1);

namespace DesignPatterns\SingletonPattern\Tests;

use DesignPatterns\SingletonPattern\ChocolateBoiler;
use PHPUnit\Framework\TestCase;

class ChocolateBoilerTest extends TestCase
{
    public function testIsSingleton(): void
    {
        $boiler1 = ChocolateBoiler::getInstance();
        $boiler2 = ChocolateBoiler::getInstance();

        $this->assertSame($boiler1, $boiler2);
    }

    /**
     * Test that the constructor is private.
     */
    public function testConstructorIsPrivate(): void
    {
        $reflection = new \ReflectionClass(ChocolateBoiler::class);
        $constructor = $reflection->getConstructor();

        $this->assertNotNull($constructor, "Constructor should exist");
        $this->assertTrue($constructor->isPrivate(), "Constructor should be private for a Singleton");
    }
}
