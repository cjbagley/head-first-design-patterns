<?php

declare(strict_types=1);

namespace DesignPatterns\CompoundPattern\Duck;

class DuckCall implements Quackable
{
    public function quack(): string
    {
        return 'Kwak';
    }
}
