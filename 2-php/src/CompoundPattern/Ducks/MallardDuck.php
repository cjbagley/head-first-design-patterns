<?php

declare(strict_types=1);

namespace DesignPatterns\CompoundPattern\Ducks;

class MallardDuck implements Quackable
{
    public function quack(): string
    {
        return 'Quack';
    }
}
