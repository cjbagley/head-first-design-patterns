<?php

declare(strict_types=1);

namespace DesignPatterns\StatePattern;

use DesignPatterns\StatePattern\States\HasQuarterState;
use DesignPatterns\StatePattern\States\NoQuarterState;
use DesignPatterns\StatePattern\States\SoldOutState;
use DesignPatterns\StatePattern\States\SoldState;
use DesignPatterns\StatePattern\States\StateInterface;

class GumballMachine
{
    private readonly StateInterface $soldOutState;

    private readonly StateInterface $noQuarterState;

    private readonly StateInterface $hasQuarterState;

    private readonly StateInterface $soldState;

    private StateInterface $currentState;

    public function __construct(private int $noOfGumballs = 0)
    {
        $this->soldOutState = new SoldOutState($this);
        $this->noQuarterState = new NoQuarterState($this);
        $this->hasQuarterState = new HasQuarterState($this);
        $this->soldState = new SoldState($this);

        $this->currentState = $this->soldOutState;
        if ($this->noOfGumballs > 0) {
            $this->currentState = $this->noQuarterState;
        }
    }

    public function insertQuarter(): string
    {
        return $this->currentState->insertQuarter();
    }

    public function ejectQuarter(): string
    {
        return $this->currentState->ejectQuarter();
    }

    public function turnCrank(): string
    {
        return implode("\n", [
            $this->currentState->turnCrank(),
            $this->currentState->dispense(),
        ]);
    }

    public function setState(StateInterface $state): void
    {
        $this->currentState = $state;
    }

    public function getSoldOutState(): StateInterface
    {
        return $this->soldOutState;
    }

    public function getNoQuarterState(): StateInterface
    {
        return $this->noQuarterState;
    }

    public function getHasQuarterState(): StateInterface
    {
        return $this->hasQuarterState;
    }

    public function getSoldState(): StateInterface
    {
        return $this->soldState;
    }

    public function getNoOfGumballs(): int
    {
        return $this->noOfGumballs;
    }

    public function releaseBall(): string
    {
        if ($this->noOfGumballs > 0) {
            $this->noOfGumballs--;
        }

        return 'A gumball comes rolling out the slot...';
    }
}
