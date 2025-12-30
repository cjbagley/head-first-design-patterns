<?php

declare(strict_types=1);

namespace DesignPatterns\StatePattern\States;

use DesignPatterns\StatePattern\GumballMachine;

class NoQuarterState implements StateInterface
{
    public function __construct(private readonly GumballMachine $gumballMachine)
    {
    }

    public function insertQuarter(): string
    {
        $this->gumballMachine->setState($this->gumballMachine->getHasQuarterState());
        return 'You inserted a quarter';
    }

    public function ejectQuarter(): string
    {
        return "You haven't inserted a quarter";
    }

    public function turnCrank(): string
    {
        return "You turned, but there's no quarter";
    }

    public function dispense(): string
    {
        return 'You need to pay first';
    }
}
