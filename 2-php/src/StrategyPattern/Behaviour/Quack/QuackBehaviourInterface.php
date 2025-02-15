<?php

declare(strict_types=1);

namespace DesignPatterns\StrategyPattern\Behaviour\Quack;

interface QuackBehaviourInterface
{
    public function quack(): string;
}
