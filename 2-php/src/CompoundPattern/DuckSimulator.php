<?php

declare(strict_types=1);

namespace DesignPatterns\CompoundPattern;

use DesignPatterns\CompoundPattern\Adapter\GooseAdapter;
use DesignPatterns\CompoundPattern\Decorator\QuackCounter;
use DesignPatterns\CompoundPattern\Duck\Quackable;
use DesignPatterns\CompoundPattern\Factory\CountingDuckFactory;
use DesignPatterns\CompoundPattern\Geese\Goose;

class DuckSimulator
{
    public function simulateDucks(): DuckSimulatorDTO
    {
        // Could inject the factory into the constructor
        // for the sake of learning/simplicity: create it here
        $duckFactory = new CountingDuckFactory();

        $mallardDuck = $duckFactory->createMallardDuck();
        $redheadDuck = $duckFactory->createRedheadDuck();
        $duckCall = $duckFactory->createDuckCall();
        $rubberDuck = $duckFactory->createRubberDuck();

        // Goose honks do not want counting
        $gooseDuck = new GooseAdapter(new Goose());

        $quacks = [];
        $quacks[] = $this->simulate($mallardDuck);
        $quacks[] = $this->simulate($redheadDuck);
        $quacks[] = $this->simulate($duckCall);
        $quacks[] = $this->simulate($rubberDuck);
        $quacks[] = $this->simulate($gooseDuck);

        return new DuckSimulatorDTO(
            simulateDucksOutput: implode("\n", $quacks),
            numberOfQuacks: QuackCounter::getNumberOfQuacks(),
        );
    }

    public function simulate(Quackable $duck): string
    {
        return $duck->quack();
    }
}
