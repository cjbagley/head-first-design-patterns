<?php

declare(strict_types=1);

namespace DesignPatterns\StrategyPattern\Ducks;

class RedheadDuck extends AbstractDuck
{
    public function display(): string
    {
        return 'I\'m a real redhead duck';
    }

    public function quack(): string
    {
        return 'moo';
    }
}