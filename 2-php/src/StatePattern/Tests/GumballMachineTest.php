<?php

declare(strict_types=1);

namespace DesignPatterns\StatePattern\Tests;

use DesignPatterns\StatePattern\GumballMachine;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class GumballMachineTest extends TestCase
{
    #[Test]
    public function it_dispenses_gumball(): void
    {
        $gumballMachine = new GumballMachine(5);

        $insertQuarterResult = $gumballMachine->insertQuarter();
        $this->assertEquals('You inserted a quarter', $insertQuarterResult);

        $turnCrankResult = $gumballMachine->turnCrank();
        $this->assertStringContainsString('You turned...', $turnCrankResult);
        $this->assertStringContainsString('A gumball comes rolling out the slot', $turnCrankResult);

        $this->assertEquals(4, $gumballMachine->getNoOfGumballs());
    }

    #[Test]
    public function it_cannot_turn_crank_without_quarter(): void
    {
        $gumballMachine = new GumballMachine(5);
        $result = $gumballMachine->turnCrank();

        $this->assertStringContainsString("You turned, but there's no quarter", $result);
        $this->assertEquals(5, $gumballMachine->getNoOfGumballs());
    }

    #[Test]
    public function it_ejects_quarter(): void
    {
        $gumballMachine = new GumballMachine(5);
        $gumballMachine->insertQuarter();
        $result = $gumballMachine->ejectQuarter();

        $this->assertEquals('Quarter returned', $result);

        $turnCrankResult = $gumballMachine->turnCrank();
        $this->assertStringContainsString("You turned, but there's no quarter", $turnCrankResult);
    }

    #[Test]
    public function it_moves_to_sold_out_state(): void
    {
        $gumballMachine = new GumballMachine(3);

        $gumballMachine->insertQuarter();
        $gumballMachine->turnCrank();
        $this->assertEquals(2, $gumballMachine->getNoOfGumballs());

        $gumballMachine->insertQuarter();
        $gumballMachine->turnCrank();
        $this->assertEquals(1, $gumballMachine->getNoOfGumballs());


        $gumballMachine->insertQuarter();
        $gumballMachine->turnCrank();
        $this->assertEquals(0, $gumballMachine->getNoOfGumballs());

        $result = $gumballMachine->insertQuarter();
        $this->assertEquals('You can not insert another quarter, the machine is sold out', $result);
    }

    #[Test]
    public function it_does_not_eject_quarter_when_empty(): void
    {
        $gumballMachine = new GumballMachine(5);
        $result = $gumballMachine->ejectQuarter();

        $this->assertEquals("You haven't inserted a quarter", $result);
    }
}
