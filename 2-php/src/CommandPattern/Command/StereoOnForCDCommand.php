<?php

declare(strict_types=1);

namespace DesignPatterns\CommandPattern\Command;

use DesignPatterns\CommandPattern\Vendor\Stereo;

readonly class StereoOnForCDCommand implements CommandInterface
{
    public function __construct(private readonly Stereo $stereo)
    {
    }

    public function execute(): void
    {
        $this->stereo->on();
        $this->stereo->setCD();
        $this->stereo->setVolume(11);
    }
}
