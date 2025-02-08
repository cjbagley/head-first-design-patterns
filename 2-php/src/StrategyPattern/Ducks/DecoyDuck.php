<?php

declare(strict_types=1);

namespace DesignPatterns\StrategyPattern\Ducks;

class DecoyDuck extends AbstractDuck
{
    public function quack(): string
    {
        return 'fake quack';
    }

    public function display(): string
    {
        return 'I\m a wooden decoy duck';
    }

    public function fly(): string
    {
        return 'I cannot fly';
    }
}