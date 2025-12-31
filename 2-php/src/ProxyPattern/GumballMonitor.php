<?php

declare(strict_types=1);

namespace DesignPatterns\ProxyPattern;

readonly class GumballMonitor
{
    public function __construct(private readonly GumballMachineInterface $gumballMachine)
    {
    }

    public function report(): string
    {
        return sprintf(
            "Gumball Machine: %s, Current Inventory: %d",
            $this->gumballMachine->getLocation(),
            $this->gumballMachine->getNoOfGumballs()
        );
    }
}
