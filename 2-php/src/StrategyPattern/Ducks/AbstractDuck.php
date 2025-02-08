<?php

declare(strict_types=1);

namespace DesignPatterns\StrategyPattern\Ducks;

use DesignPatterns\StrategyPattern\Behaviour\Quacks\QuackBehaviourInterface;

abstract class AbstractDuck implements QuackBehaviourInterface
{
    public function display(): string
    {
        return 'I\m a real duck';
    }

    public function quack(): string
    {
        return 'quack';
    }

    public function fly(): string
    {
        return 'I fly with wings';
    }
}