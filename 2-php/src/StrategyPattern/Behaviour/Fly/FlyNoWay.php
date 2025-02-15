<?php

declare(strict_types=1);

namespace DesignPatterns\StrategyPattern\Behaviour\Fly;

use DesignPatterns\StrategyPattern\Behaviour\Fly\FlyBehaviourInterface;

class FlyNoWay implements FlyBehaviourInterface
{
    public function fly(): string
    {
        return 'I cannot fly';
    }
}
