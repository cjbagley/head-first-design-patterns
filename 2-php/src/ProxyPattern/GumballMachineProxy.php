<?php

declare(strict_types=1);

namespace DesignPatterns\ProxyPattern;

readonly class GumballMachineProxy implements GumballMachineInterface
{
    public function __construct(private string $url)
    {
    }

    public function getLocation(): string
    {
        // In this example, we call a remote APU to get the location
        return sprintf('(API call for location: %s)', $this->url);
    }

    public function getNoOfGumballs(): int
    {
        // In this example, we call a remote APU to get the location
        // Yes, this is a hack, but it works as a learning example
        return match ($this->url) {
            'Lincoln' => 40,
            'New York' => 20,
            'Cork' => 15,
            default => 10,
        };
    }
}
