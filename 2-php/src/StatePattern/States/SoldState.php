<?php

declare(strict_types=1);

namespace DesignPatterns\StatePattern\States;

use DesignPatterns\StatePattern\GumballMachine;

class SoldState implements StateInterface
{
    public function __construct(private readonly GumballMachine $gumballMachine)
    {
    }

    public function insertQuarter(): string
    {
        return 'Please wait, we are already giving you a gumball';
    }

    public function ejectQuarter(): string
    {
        return 'Sorry, you already turned the crank';
    }

    public function turnCrank(): string
    {
        return "Turning twice doesn't get you another gumball!";
    }

    public function dispense(): string
    {
        $this->gumballMachine->releaseBall();
        if ($this->gumballMachine->getNoOfGumballs() > 0) {
            $this->gumballMachine->setState($this->gumballMachine->getNoQuarterState());
            return 'A gumball comes rolling out the slot';
        } else {
            $this->gumballMachine->setState($this->gumballMachine->getSoldOutState());
            return 'Oops, out of gumballs!';
        }
    }
}
