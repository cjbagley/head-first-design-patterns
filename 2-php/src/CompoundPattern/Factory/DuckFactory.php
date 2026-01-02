<?php

declare(strict_types=1);

namespace DesignPatterns\CompoundPattern\Factory;

use DesignPatterns\CompoundPattern\Duck\DuckCall;
use DesignPatterns\CompoundPattern\Duck\MallardDuck;
use DesignPatterns\CompoundPattern\Duck\Quackable;
use DesignPatterns\CompoundPattern\Duck\RedheadDuck;
use DesignPatterns\CompoundPattern\Duck\RubberDuck;

class DuckFactory extends AbstractDuckFactory
{
    public function createMallardDuck(): Quackable
    {
        return new MallardDuck();
    }

    public function createRedheadDuck(): Quackable
    {
        return new RedheadDuck();
    }

    public function createDuckCall(): Quackable
    {
        return new DuckCall();
    }

    public function createRubberDuck(): Quackable
    {
        return new RubberDuck();
    }
}
