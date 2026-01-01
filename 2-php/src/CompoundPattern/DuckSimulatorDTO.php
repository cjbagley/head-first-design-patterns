<?php

declare(strict_types=1);

namespace DesignPatterns\CompoundPattern;

readonly class DuckSimulatorDTO
{
    public function __construct(
        private string $simulateDucksOutput,
        private int $numberOfQuacks,
    ) {
    }

    public function getSimulateDucksOutput(): string
    {
        return $this->simulateDucksOutput;
    }

    public function getNumberOfQuacks(): int
    {
        return $this->numberOfQuacks;
    }
}
