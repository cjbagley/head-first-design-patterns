<?php

declare(strict_types=1);

namespace DesignPatterns\StrategyPattern\Behaviour\Fly;

use DesignPatterns\StrategyPattern\Behaviour\Fly\FlyBehaviourInterface;

class FlyWithRocket implements FlyBehaviourInterface
{
    public function fly(): string
    {
        return 'I fly with a rocket!!!';
    }
}