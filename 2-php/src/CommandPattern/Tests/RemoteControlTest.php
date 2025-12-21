<?php

declare(strict_types=1);

namespace DesignPatterns\CommandPattern\Tests;

use DesignPatterns\CommandPattern\Command\CeilingFanOffCommand;
use DesignPatterns\CommandPattern\Command\CeilingFanOnCommand;
use DesignPatterns\CommandPattern\Command\LightOffCommand;
use DesignPatterns\CommandPattern\Command\LightOnCommand;
use DesignPatterns\CommandPattern\Command\StereoOffCommand;
use DesignPatterns\CommandPattern\Command\StereoOnForCDCommand;
use DesignPatterns\CommandPattern\RemoteControl;
use DesignPatterns\CommandPattern\Vendor\CeilingFan;
use DesignPatterns\CommandPattern\Vendor\Light;
use DesignPatterns\CommandPattern\Vendor\Stereo;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class RemoteControlTest extends TestCase
{
    #[Test]
    public function it_can_program_and_trigger_multiple_slots(): void
    {
        $remote = new RemoteControl();

        // Slot 0: Living Room Light
        $livingRoomLightMock = $this->createMock(Light::class);
        $livingRoomLightMock->expects($this->once())->method('on');
        $livingRoomLightMock->expects($this->once())->method('off');

        $LivingRoomLightOn = new LightOnCommand($livingRoomLightMock);
        $LivingRoomLightOff = new LightOffCommand($livingRoomLightMock);

        $remote->setCommand(0, $LivingRoomLightOn, $LivingRoomLightOff);

        // Slot 1: Kitchen Room Light
        $kitchenLightMock = $this->createMock(Light::class);
        $kitchenLightMock->expects($this->once())->method('on');
        $kitchenLightMock->expects($this->once())->method('off');

        $kitchenLightOn = new LightOnCommand($kitchenLightMock);
        $kitchenLightOff = new LightOffCommand($kitchenLightMock);

        $remote->setCommand(1, $kitchenLightOn, $kitchenLightOff);

        // Setup slot 2: Ceiling Fan
        $ceilingFanMock = $this->createMock(CeilingFan::class);
        $ceilingFanMock->expects($this->once())->method('high');
        $ceilingFanMock->expects($this->once())->method('off');

        $ceilingFanOn = new CeilingFanOnCommand($ceilingFanMock);
        $ceilingFanOff = new CeilingFanOffCommand($ceilingFanMock);

        $remote->setCommand(2, $ceilingFanOn, $ceilingFanOff);

        // Setup slot 3: Stereo
        $stereoMock = $this->createMock(Stereo::class);
        $stereoMock->expects($this->exactly(2))->method('on');
        $stereoMock->expects($this->exactly(2))->method('off');

        $stereoOn = new StereoOnForCDCommand($stereoMock);
        $stereoOff = new StereoOffCommand($stereoMock);

        $remote->setCommand(3, $stereoOn, $stereoOff);

        // Press the buttons!
        $remote->pressOnButton(0);
        $remote->pressOffButton(0);
        $remote->pressOnButton(1);
        $remote->pressOffButton(1);
        $remote->pressOnButton(2);
        $remote->pressOffButton(2);
        $remote->pressOnButton(3);
        $remote->pressOffButton(3);
        $remote->pressOnButton(3);
        $remote->pressOffButton(3);
    }

    #[Test]
    public function it_does_nothing_when_pressing_unprogrammed_slots(): void
    {
        $this->expectNotToPerformAssertions();

        try {
            $remote = new RemoteControl();

            $remote->pressOnButton(6);
            $remote->pressOffButton(6);
        } catch (\Throwable $throwable) {
            $this->fail($throwable->getMessage());
        }

    }

    #[Test]
    public function it_ignores_out_of_bounds_slots(): void
    {
        try {
            $remote = new RemoteControl();

            $lightMock = $this->createMock(Light::class);
            $lightMock->expects($this->never())->method($this->anything());

            $onCommand = new LightOnCommand($lightMock);
            $offCommand = new LightOffCommand($lightMock);

            $remote->setCommand(7, $onCommand, $offCommand);
            $remote->setCommand(99, $onCommand, $offCommand);

            $remote->pressOnButton(7);
            $remote->pressOnButton(99);
        } catch (\Throwable $throwable) {
            $this->fail($throwable->getMessage());
        }
    }
}
