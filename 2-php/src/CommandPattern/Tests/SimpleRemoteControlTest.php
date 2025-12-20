<?php

declare(strict_types=1);

namespace DesignPatterns\CommandPattern\Tests;

use DesignPatterns\CommandPattern\Command\LightOnCommand;
use DesignPatterns\CommandPattern\Light\Light;
use DesignPatterns\CommandPattern\SimpleRemoteControl;
use PHPUnit\Framework\TestCase;

class SimpleRemoteControlTest extends TestCase
{
    public function testRemoteControlInvokesLightOn(): void
    {
        $lightMock = $this->createMock(Light::class);

        $lightMock->expects($this->once())
            ->method('on');

        $lightOnCommand = new LightOnCommand($lightMock);

        $remote = new SimpleRemoteControl();
        $remote->setCommand($lightOnCommand);

        $remote->buttonWasPressed();
    }
}
