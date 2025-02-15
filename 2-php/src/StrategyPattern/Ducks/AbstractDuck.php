<?php

declare(strict_types=1);

namespace DesignPatterns\StrategyPattern\Ducks;

use DesignPatterns\StrategyPattern\Behaviour\Fly\FlyBehaviourInterface;
use DesignPatterns\StrategyPattern\Behaviour\Quack\QuackBehaviourInterface;

abstract class AbstractDuck implements QuackBehaviourInterface
{
    protected QuackBehaviourInterface $quackBehaviour;

    protected FlyBehaviourInterface $flyBehaviour;

    abstract public function display(): string;

    public function quack(): string
    {
        return $this->quackBehaviour->quack();
    }

    public function fly(): string
    {
        return $this->flyBehaviour->fly();
    }

    public function setQuackBehaviour(QuackBehaviourInterface $quackBehaviour): void
    {
        $this->quackBehaviour = $quackBehaviour;
    }

    public function setFlyBehaviour(FlyBehaviourInterface $flyBehaviour): void
    {
        $this->flyBehaviour = $flyBehaviour;
    }
}
