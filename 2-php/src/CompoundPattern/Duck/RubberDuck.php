<?php

declare(strict_types=1);

namespace DesignPatterns\CompoundPattern\Duck;

class RubberDuck implements Quackable
{
    public function quack(): string
    {
        return 'Squeak';
    }
}
