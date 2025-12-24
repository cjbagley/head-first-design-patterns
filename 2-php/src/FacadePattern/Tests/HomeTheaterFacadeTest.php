<?php

declare(strict_types=1);

namespace DesignPatterns\FacadePattern\Tests;

use DesignPatterns\FacadePattern\HomeTheaterFacade;
use DesignPatterns\FacadePattern\LowLevel\Amplifier;
use DesignPatterns\FacadePattern\LowLevel\PopcornPopper;
use DesignPatterns\FacadePattern\LowLevel\Projector;
use DesignPatterns\FacadePattern\LowLevel\Screen;
use DesignPatterns\FacadePattern\LowLevel\StreamingPlayer;
use DesignPatterns\FacadePattern\LowLevel\TheaterLights;
use DesignPatterns\FacadePattern\LowLevel\Tuner;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class HomeTheaterFacadeTest extends TestCase
{
    private MockObject $amplifier;

    private MockObject $tuner;

    private MockObject $player;

    private MockObject $projector;

    private MockObject $screen;

    private MockObject $lights;

    private MockObject $popper;

    private HomeTheaterFacade $facade;

    protected function setUp(): void
    {
        $this->amplifier = $this->createMock(Amplifier::class);
        $this->tuner = $this->createMock(Tuner::class);
        $this->player = $this->createMock(StreamingPlayer::class);
        $this->projector = $this->createMock(Projector::class);
        $this->screen = $this->createMock(Screen::class);
        $this->lights = $this->createMock(TheaterLights::class);
        $this->popper = $this->createMock(PopcornPopper::class);

        $this->facade = new HomeTheaterFacade(
            $this->amplifier,
            $this->tuner,
            $this->player,
            $this->projector,
            $this->screen,
            $this->lights,
            $this->popper
        );
    }

    #[Test]
    public function it_handles_watchMovie(): void
    {
        $this->popper->expects($this->once())->method('on');
        $this->popper->expects($this->once())->method('pop');
        $this->lights->expects($this->once())->method('dim');
        $this->screen->expects($this->once())->method('down');
        $this->projector->expects($this->once())->method('on');
        $this->amplifier->expects($this->once())->method('on');
        $this->tuner->expects($this->once())->method('on');
        $this->player->expects($this->once())->method('on');
        $this->player->expects($this->once())->method('play');

        $this->facade->watchMovie();
    }

    #[Test]
    public function it_handles_endMovie(): void
    {
        $this->popper->expects($this->once())->method('off');
        $this->lights->expects($this->once())->method('on');
        $this->screen->expects($this->once())->method('up');
        $this->projector->expects($this->once())->method('off');
        $this->amplifier->expects($this->once())->method('off');
        $this->tuner->expects($this->once())->method('off');
        $this->player->expects($this->once())->method('off');

        $this->facade->endMovie();
    }
}
