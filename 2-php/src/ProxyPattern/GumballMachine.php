<?php

declare(strict_types=1);

namespace DesignPatterns\ProxyPattern;

readonly class GumballMachine implements GumballMachineInterface
{
    public function __construct(private string $location, private int $noOfGumballs)
    {
    }

    public function getLocation(): string
    {
        return $this->location;
    }

    public function getNoOfGumballs(): int
    {
        return $this->noOfGumballs;
    }
}
