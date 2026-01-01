<?php

declare(strict_types=1);

namespace DesignPatterns\CompoundPattern\Ducks;

class RubberDuck implements Quackable
{
    public function quack(): string
    {
        return 'Squeak';
    }
}
