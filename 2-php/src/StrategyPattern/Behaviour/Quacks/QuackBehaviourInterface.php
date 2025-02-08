<?php

declare(strict_types=1);

namespace DesignPatterns\StrategyPattern\Behaviour\Quacks;

interface QuackBehaviourInterface
{
    public function quack(): string;
}