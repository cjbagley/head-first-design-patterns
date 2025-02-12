<?php

namespace DesignPatterns\DecoratorPattern\Beverages;

use DesignPatterns\DecoratorPattern\Beverages\AbstractBeverage;

class Espresso extends AbstractBeverage
{
    public function getDescription(): string
    {
        return 'Espresso';
    }

    public function getCost(): float
    {
        return 1.99;
    }
}