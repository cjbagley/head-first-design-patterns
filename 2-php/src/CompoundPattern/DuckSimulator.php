<?php

declare(strict_types=1);

namespace DesignPatterns\CompoundPattern;

use DesignPatterns\CompoundPattern\Adapter\GooseAdapter;
use DesignPatterns\CompoundPattern\Composite\Flock;
use DesignPatterns\CompoundPattern\Decorator\QuackCounter;
use DesignPatterns\CompoundPattern\Factory\CountingDuckFactory;
use DesignPatterns\CompoundPattern\Geese\Goose;

class DuckSimulator
{
    public function simulateDucks(): DuckSimulatorDTO
    {
        // Could inject the factory into the constructor
        // for the sake of learning/simplicity: create it here
        $duckFactory = new CountingDuckFactory();

        $flock = new Flock();
        $flock->add($duckFactory->createMallardDuck());
        $flock->add($duckFactory->createRedheadDuck());
        $flock->add($duckFactory->createDuckCall());
        $flock->add($duckFactory->createRubberDuck());
        $flock->add(new GooseAdapter(new Goose()));

        return new DuckSimulatorDTO(
            simulateDucksOutput: $flock->quack(),
            duckCount: $flock->getFlockCount(),
            numberOfQuacks: QuackCounter::getNumberOfQuacks(),
        );
    }
}
