<?php

declare(strict_types=1);

namespace DesignPatterns\CommandPattern\Command;

use DesignPatterns\CommandPattern\Vendor\Light;

readonly class LightOffCommand implements CommandInterface
{
    public function __construct(private readonly Light $light)
    {
    }

    public function execute(): void
    {
        $this->light->off();
    }
}
