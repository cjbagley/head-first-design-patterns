<?php

declare(strict_types=1);

namespace DesignPatterns\CommandPattern;

use DesignPatterns\CommandPattern\Command\CommandInterface;
use DesignPatterns\CommandPattern\Command\NoCommand;

/**
 * Remote control with slots available for 7 on commands and 7 off commands
 */
class RemoteControlWithUndo
{
    /**
     * @var array<CommandInterface> $onCommands
     */
    private array $onCommands = [];

    /**
     * @var array<CommandInterface> $offCommands
     */
    private array $offCommands = [];

    private CommandInterface $undoCommand;

    public function __construct()
    {
        $noCommand = new NoCommand();
        for ($i = 0; $i < 7; $i++) {
            $this->onCommands[$i] = $noCommand;
            $this->offCommands[$i] = $noCommand;
        }

        $this->undoCommand = $noCommand;
    }

    public function setCommand(int $slot, CommandInterface $onCommand, CommandInterface $offCommand): void
    {
        if ($this->isValidSlot($slot) === false) {
            return;
        }

        $this->onCommands[$slot] = $onCommand;
        $this->offCommands[$slot] = $offCommand;
    }

    public function pressOnButton(int $slot): void
    {
        if ($this->isValidSlot($slot) === false) {
            return;
        }

        $this->onCommands[$slot]->execute();
        $this->undoCommand = $this->onCommands[$slot];
    }

    public function pressOffButton(int $slot): void
    {
        if ($this->isValidSlot($slot) === false) {
            return;
        }

        $this->offCommands[$slot]->execute();
        $this->undoCommand = $this->offCommands[$slot];
    }

    public function pressUndoButton(): void
    {
        $this->undoCommand->undo();
    }

    private function isValidSlot(int $slot): bool
    {
        return $slot >= 0 && $slot <= 6;
    }
}
