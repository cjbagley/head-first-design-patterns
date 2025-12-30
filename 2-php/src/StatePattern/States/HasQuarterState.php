<?php

declare(strict_types=1);

namespace DesignPatterns\StatePattern\States;

use DesignPatterns\StatePattern\GumballMachine;

class HasQuarterState implements StateInterface
{
    public function __construct(private readonly GumballMachine $gumballMachine)
    {
    }

    public function insertQuarter(): string
    {
        return 'You can not insert another quarter';
    }

    public function ejectQuarter(): string
    {
        $this->gumballMachine->setState($this->gumballMachine->getNoQuarterState());
        return 'Quarter returned';
    }

    public function turnCrank(): string
    {
        $this->gumballMachine->setState($this->gumballMachine->getSoldState());
        return 'You turned...';
    }

    public function dispense(): string
    {
        return 'No gumball dispensed';
    }
}
