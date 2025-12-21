<?php

declare(strict_types=1);

namespace DesignPatterns\CommandPattern;

use DesignPatterns\CommandPattern\Command\CommandInterface;

/**
 * Remote control with only one slot for a command
 */
class SimpleRemoteControl
{
    private CommandInterface $command; // 'slot' in the book

    public function setCommand(CommandInterface $command): void
    {
        $this->command = $command;
    }

    public function pressButton(): void
    {
        $this->command->execute();
    }
}
