<?php

namespace DesignPatterns\DecoratorPattern\Beverages;

use DesignPatterns\DecoratorPattern\Beverages\BeverageInterface;

class Espresso implements BeverageInterface
{
    public function getDescription(): string
    {
        return 'Espresso';
    }

    public function getCost(): int
    {
        return 199;
    }
}
