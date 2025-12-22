<?php

declare(strict_types=1);

namespace DesignPatterns\CommandPattern\Command;

use DesignPatterns\CommandPattern\Vendor\GarageDoor;

readonly class GarageDoorCloseCommand implements CommandInterface
{
    public function __construct(private readonly GarageDoor $garageDoor)
    {
    }

    public function execute(): void
    {
        $this->garageDoor->down();
    }

    public function undo(): void
    {
        $this->garageDoor->up();
    }
}
