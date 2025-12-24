<?php

declare(strict_types=1);

namespace DesignPatterns\FacadePattern\LowLevel;

class Amplifier
{
    private int $volume = 5;

    public function on(): void
    {
    }

    public function off(): void
    {
    }

    public function setVolume(int $volume): void
    {
        $this->volume = $volume;
    }

    public function getVolume(): int
    {
        return $this->volume;
    }
}
