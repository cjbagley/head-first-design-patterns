<?php

declare(strict_types=1);

namespace DesignPatterns\CompoundPattern\Factory;

use DesignPatterns\CompoundPattern\Decorator\QuackCounter;
use DesignPatterns\CompoundPattern\Duck\DuckCall;
use DesignPatterns\CompoundPattern\Duck\MallardDuck;
use DesignPatterns\CompoundPattern\Duck\Quackable;
use DesignPatterns\CompoundPattern\Duck\RedheadDuck;
use DesignPatterns\CompoundPattern\Duck\RubberDuck;

class CountingDuckFactory extends AbstractDuckFactory
{
    public function createMallardDuck(): Quackable
    {
        return new QuackCounter(new MallardDuck());
    }

    public function createRedheadDuck(): Quackable
    {
        return new QuackCounter(new RedheadDuck());
    }

    public function createDuckCall(): Quackable
    {
        return new QuackCounter(new DuckCall());
    }

    public function createRubberDuck(): Quackable
    {
        return new QuackCounter(new RubberDuck());
    }
}
