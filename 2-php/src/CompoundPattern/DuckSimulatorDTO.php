<?php

declare(strict_types=1);

namespace DesignPatterns\CompoundPattern;

readonly class DuckSimulatorDTO
{
    public function __construct(
        private string $simulateDucksOutput,
        private int $duckCount,
        private int $numberOfQuacks,
    ) {
    }

    public function getSimulateDucksOutput(): string
    {
        return $this->simulateDucksOutput;
    }

    public function getDuckCount(): int
    {
        return $this->duckCount;
    }

    public function getNumberOfQuacks(): int
    {
        return $this->numberOfQuacks;
    }
}
