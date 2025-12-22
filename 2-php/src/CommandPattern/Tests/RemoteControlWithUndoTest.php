<?php

declare(strict_types=1);

namespace DesignPatterns\CommandPattern\Tests;

use DesignPatterns\CommandPattern\Command\LightOffCommand;
use DesignPatterns\CommandPattern\Command\LightOnCommand;
use DesignPatterns\CommandPattern\RemoteControlWithUndo;
use DesignPatterns\CommandPattern\Vendor\Light;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class RemoteControlWithUndoTest extends TestCase
{
    #[Test]
    public function it_can_undo_the_last_command(): void
    {
        $remote = new RemoteControlWithUndo();
        $lightMock = $this->createMock(Light::class);

        $lightOn = new LightOnCommand($lightMock);
        $lightOff = new LightOffCommand($lightMock);

        $remote->setCommand(0, $lightOn, $lightOff);

        $lightMock->expects($this->once())->method('on');
        $lightMock->expects($this->once())->method('off');

        $remote->pressOnButton(0);
        $remote->pressUndoButton();
    }

    #[Test]
    public function it_can_undo_multiple_different_actions_sequentially(): void
    {
        $remote = new RemoteControlWithUndo();
        $lightMock = $this->createMock(Light::class);

        $lightOn = new LightOnCommand($lightMock);
        $lightOff = new LightOffCommand($lightMock);

        $remote->setCommand(0, $lightOn, $lightOff);

        $lightMock->expects($this->exactly(2))->method('on');
        $lightMock->expects($this->once())->method('off');

        $remote->pressOnButton(0);
        $remote->pressOffButton(0);
        $remote->pressUndoButton();
    }

    #[Test]
    public function it_does_nothing_when_undo_is_pressed_before_any_command(): void
    {
        $this->expectNotToPerformAssertions();

        $remote = new RemoteControlWithUndo();
        $remote->pressUndoButton();
    }
}
