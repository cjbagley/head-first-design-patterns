<?php

declare(strict_types=1);

namespace DesignPatterns\StrategyPattern\Behaviour\Quack;

use DesignPatterns\StrategyPattern\Behaviour\Quack\QuackBehaviourInterface;

class Squeak implements QuackBehaviourInterface
{
    public function quack(): string
    {
        return 'squeak';
    }
}