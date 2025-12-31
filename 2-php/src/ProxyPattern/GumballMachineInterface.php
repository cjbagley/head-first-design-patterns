<?php

declare(strict_types=1);

namespace DesignPatterns\ProxyPattern;

interface GumballMachineInterface
{
    public function getLocation(): string;

    public function getNoOfGumballs(): int;
}
