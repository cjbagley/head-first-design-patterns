<?php

declare(strict_types=1);

namespace DesignPatterns\StrategyPattern\Ducks;

use DesignPatterns\StrategyPattern\Behaviour\Fly\FlyWithWings;
use DesignPatterns\StrategyPattern\Behaviour\Quack\Quack;

class RedheadDuck extends AbstractDuck
{
    public function __construct()
    {
        $this->flyBehaviour = new FlyWithWings();
        $this->quackBehaviour = new Quack();
    }

    public function display(): string
    {
        return "I'm a real redhead duck";
    }
}
