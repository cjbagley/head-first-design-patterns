<?php

declare(strict_types=1);

namespace DesignPatterns\CompoundPattern;

use DesignPatterns\CompoundPattern\Adapters\GooseAdapter;
use DesignPatterns\CompoundPattern\Decorators\QuackCounter;
use DesignPatterns\CompoundPattern\Ducks\DuckCall;
use DesignPatterns\CompoundPattern\Ducks\MallardDuck;
use DesignPatterns\CompoundPattern\Ducks\Quackable;
use DesignPatterns\CompoundPattern\Ducks\RedheadDuck;
use DesignPatterns\CompoundPattern\Ducks\RubberDuck;
use DesignPatterns\CompoundPattern\Geese\Goose;

class DuckSimulator
{
    public function simulateDucks(): DuckSimulatorDTO
    {
        $mallardDuck = new QuackCounter(new MallardDuck());
        $redheadDuck = new QuackCounter(new RedheadDuck());
        $duckCall = new QuackCounter(new DuckCall());
        $rubberDuck = new QuackCounter(new RubberDuck());

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
