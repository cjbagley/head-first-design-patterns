<?php

namespace DesignPatterns\StrategyPattern\Tests;

use DesignPatterns\StrategyPattern\Test;
use PHPUnit\Framework\TestCase;

class TestTest extends TestCase
{
    public function testA(): void
    {
        $test = new Test();
        $this->assertSame('hello', $test->test());
    }
}