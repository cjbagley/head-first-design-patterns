<?php

declare(strict_types=1);

namespace DesignPatterns\StrategyPattern\Behaviour\Quack;

use DesignPatterns\StrategyPattern\Behaviour\Quack\QuackBehaviourInterface;

class Quack implements QuackBehaviourInterface
{
    public function quack(): string
    {
        return 'quack';
    }
}
