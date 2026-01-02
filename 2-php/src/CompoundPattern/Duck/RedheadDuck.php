<?php

declare(strict_types=1);

namespace DesignPatterns\CompoundPattern\Duck;

class RedheadDuck implements Quackable
{
    public function quack(): string
    {
        return 'Quack';
    }
}
