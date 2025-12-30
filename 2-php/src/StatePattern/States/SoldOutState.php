<?php

declare(strict_types=1);

namespace DesignPatterns\StatePattern\States;

use DesignPatterns\StatePattern\GumballMachine;

class SoldOutState implements StateInterface
{
    public function __construct(private readonly GumballMachine $gumballMachine)
    {
    }

    public function insertQuarter(): string
    {
        return 'You can not insert another quarter, the machine is sold out';
    }

    public function ejectQuarter(): string
    {
        return "You can not eject, you haven't inserted a quarter yet";
    }

    public function turnCrank(): string
    {
        return 'You turned, but there are no gumballs';
    }

    public function dispense(): string
    {
        return 'No gumball dispensed';
    }
}
