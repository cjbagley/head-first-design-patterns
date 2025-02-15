<?php

declare(strict_types=1);

namespace DesignPatterns\StrategyPattern\Ducks;

use DesignPatterns\StrategyPattern\Behaviour\Fly\FlyNoWay;
use DesignPatterns\StrategyPattern\Behaviour\Quack\Squeak;

class RubberDuck extends AbstractDuck
{
    public function __construct()
    {
        $this->flyBehaviour = new FlyNoWay();
        $this->quackBehaviour = new Squeak();
    }

    public function display(): string
    {
        return "I'm a plastic rubber duck";
    }
}
