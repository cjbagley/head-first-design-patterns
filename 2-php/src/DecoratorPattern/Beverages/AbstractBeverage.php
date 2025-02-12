<?php

namespace DesignPatterns\DecoratorPattern\Beverages;

abstract class AbstractBeverage
{
    public function getDescription(): string
    {
        return 'Unknown Beverage';
    }

    public function getCost(): float
    {
        return 0;
    }
}