<?php

declare(strict_types=1);

namespace DesignPatterns\CommandPattern\Tests;

use DesignPatterns\CommandPattern\Command\CeilingFanOffCommand;
use DesignPatterns\CommandPattern\Command\CeilingFanOnCommand;
use DesignPatterns\CommandPattern\Command\GarageDoorCloseCommand;
use DesignPatterns\CommandPattern\Command\GarageDoorOpenCommand;
use DesignPatterns\CommandPattern\Command\LightOffCommand;
use DesignPatterns\CommandPattern\Command\LightOnCommand;
use DesignPatterns\CommandPattern\Command\StereoOffCommand;
use DesignPatterns\CommandPattern\Command\StereoOnForCDCommand;
use DesignPatterns\CommandPattern\SimpleRemoteControl;
use DesignPatterns\CommandPattern\Vendor\CeilingFan;
use DesignPatterns\CommandPattern\Vendor\GarageDoor;
use DesignPatterns\CommandPattern\Vendor\Light;
use DesignPatterns\CommandPattern\Vendor\Stereo;
use Iterator;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class SimpleRemoteControlTest extends TestCase
{
    /**
     * @return \Iterator<int, array{0: class-string, 1: class-string, 2: string[]}>
     */
    public static function dataProvider(): Iterator
    {
        yield [Light::class, LightOnCommand::class, ['on']];
        yield [Light::class, LightOffCommand::class, ['off']];
        yield [GarageDoor::class, GarageDoorOpenCommand::class, ['up']];
        yield [GarageDoor::class, GarageDoorCloseCommand::class, ['down']];
        yield [CeilingFan::class, CeilingFanOnCommand::class, ['high']];
        yield [CeilingFan::class, CeilingFanOffCommand::class, ['off']];
        yield [Stereo::class, StereoOnForCDCommand::class, ['on', 'setCD', 'setVolume']];
        yield [Stereo::class, StereoOffCommand::class, ['off']];
    }

    #[Test]
    public function it_runs_expected_commands(): void
    {
        $remote = new SimpleRemoteControl();

        foreach (self::dataProvider() as [$vendorClass, $commandClass, $expectedMethods]) {
            $vendorMock = $this->createMock($vendorClass);

            foreach ($expectedMethods as $method) {
                $vendorMock
                    ->expects($this->once())
                    ->method($method);
            }

            $command = new $commandClass($vendorMock);

            $remote->setCommand($command);
            $remote->pressButton();
        }
    }
}
