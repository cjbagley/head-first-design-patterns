<?php

declare(strict_types=1);

namespace DesignPatterns\CompoundPattern\Duck;

class MallardDuck implements Quackable
{
    public function quack(): string
    {
        return 'Quack';
    }
}
