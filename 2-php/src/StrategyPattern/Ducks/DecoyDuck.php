<?php

declare(strict_types=1);

namespace DesignPatterns\StrategyPattern\Ducks;

use DesignPatterns\StrategyPattern\Behaviour\Fly\FlyNoWay;
use DesignPatterns\StrategyPattern\Behaviour\Quack\MuteQuack;

class DecoyDuck extends AbstractDuck
{
    public function __construct()
    {
        $this->flyBehaviour = new FlyNoWay();
        $this->quackBehaviour = new MuteQuack();
    }

    public function display(): string
    {
        return 'I\m a wooden decoy duck';
    }
}
