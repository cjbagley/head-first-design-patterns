<?php

declare(strict_types=1);

namespace DesignPatterns\CommandPattern\Command;

use DesignPatterns\CommandPattern\Vendor\CeilingFan;

readonly class CeilingFanOffCommand implements CommandInterface
{
    public function __construct(private readonly CeilingFan $ceilingFan)
    {
    }

    public function execute(): void
    {
        $this->ceilingFan->off();
    }
}
