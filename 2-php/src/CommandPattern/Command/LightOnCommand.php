<?php

declare(strict_types=1);

namespace DesignPatterns\CommandPattern\Command;

use DesignPatterns\CommandPattern\Light\Light;

class LightOnCommand implements CommandInterface
{
    public function __construct(private readonly Light $light)
    {
    }

    public function execute(): void
    {
        $this->light->on();
    }
}
