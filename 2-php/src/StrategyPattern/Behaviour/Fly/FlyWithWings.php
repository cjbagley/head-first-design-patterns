<?php

declare(strict_types=1);

namespace DesignPatterns\StrategyPattern\Behaviour\Fly;

use DesignPatterns\StrategyPattern\Behaviour\Fly\FlyBehaviourInterface;

class FlyWithWings implements FlyBehaviourInterface
{
    public function fly(): string
    {
        return 'I fly with wings';
    }
}