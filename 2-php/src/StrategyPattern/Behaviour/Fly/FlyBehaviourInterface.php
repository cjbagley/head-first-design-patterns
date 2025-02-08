<?php

declare(strict_types=1);

namespace DesignPatterns\StrategyPattern\Behaviour\Fly;

interface FlyBehaviourInterface
{
    public function fly(): string;
}