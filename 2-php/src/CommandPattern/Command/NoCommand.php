<?php

declare(strict_types=1);

namespace DesignPatterns\CommandPattern\Command;

readonly class NoCommand implements CommandInterface
{
    public function __construct()
    {
    }

    public function execute(): void
    {
        // Does nothing
    }

    public function undo(): void
    {
        // Does nothing
    }
}
