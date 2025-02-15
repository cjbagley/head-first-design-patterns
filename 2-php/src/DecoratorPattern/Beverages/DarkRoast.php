<?php

namespace DesignPatterns\DecoratorPattern\Beverages;

use DesignPatterns\DecoratorPattern\Beverages\BeverageInterface;

class DarkRoast implements BeverageInterface
{
    public function getDescription(): string
    {
        return 'Dark Roast';
    }

    public function getCost(): int
    {
        return 99;
    }
}
