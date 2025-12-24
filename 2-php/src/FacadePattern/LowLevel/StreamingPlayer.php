<?php

declare(strict_types=1);

namespace DesignPatterns\FacadePattern\LowLevel;

readonly class StreamingPlayer
{
    public function __construct(private Amplifier $amplifier)
    {
    }

    public function on(): void
    {
    }

    public function off(): void
    {
    }

    public function pause(): void
    {
    }

    public function play(): void
    {
    }

    public function stop(): void
    {
    }

    public function setVolume(int $volume): void
    {
        $this->amplifier->setVolume($volume);
    }
}
