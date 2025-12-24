<?php

declare(strict_types=1);

namespace DesignPatterns\FacadePattern;

use DesignPatterns\FacadePattern\LowLevel\Amplifier;
use DesignPatterns\FacadePattern\LowLevel\PopcornPopper;
use DesignPatterns\FacadePattern\LowLevel\Projector;
use DesignPatterns\FacadePattern\LowLevel\Screen;
use DesignPatterns\FacadePattern\LowLevel\StreamingPlayer;
use DesignPatterns\FacadePattern\LowLevel\TheaterLights;
use DesignPatterns\FacadePattern\LowLevel\Tuner;

readonly class HomeTheaterFacade
{
    public function __construct(
        private Amplifier $amplifier,
        private Tuner $tuner,
        private StreamingPlayer $streamingPlayer,
        private Projector $projector,
        private Screen $screen,
        private TheaterLights $theaterLights,
        private PopcornPopper $popcornPopper,
    ) {
    }

    public function watchMovie(): void
    {
        $this->popcornPopper->on();
        $this->popcornPopper->pop();
        $this->theaterLights->dim();
        $this->screen->down();
        $this->projector->on();
        $this->amplifier->on();
        $this->tuner->on();
        $this->streamingPlayer->on();
        $this->streamingPlayer->play();
    }

    public function endMovie(): void
    {
        $this->popcornPopper->off();
        $this->theaterLights->on();
        $this->screen->up();
        $this->projector->off();
        $this->amplifier->off();
        $this->tuner->off();
        $this->streamingPlayer->off();
    }
}
