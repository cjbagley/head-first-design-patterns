<?php

declare(strict_types=1);

namespace DesignPatterns\CompoundPattern\Composite;

use DesignPatterns\CompoundPattern\Duck\Quackable;

class Flock implements Quackable
{
    private array $quackers = [];

    public function add(Quackable $duck): void
    {
        $this->quackers[] = $duck;
    }

    public function getFlockCount(): int
    {
        return count($this->quackers);
    }

    public function quack(): string
    {
        $flockQuackCallback = fn (Quackable $duck): string => $duck->quack();

        return implode("\n", array_map($flockQuackCallback, $this->quackers));
    }
}
