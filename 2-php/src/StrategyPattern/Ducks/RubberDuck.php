<?php

declare(strict_types=1);

namespace DesignPatterns\StrategyPattern\Ducks;

class RubberDuck extends AbstractDuck
{
    public function display(): string
    {
        return 'I\'m a plastic rubber duck';
    }

    public function quack(): string
    {
       return 'squeak';
    }

    public function fly(): string
    {
        return 'I cannot fly';
    }
}