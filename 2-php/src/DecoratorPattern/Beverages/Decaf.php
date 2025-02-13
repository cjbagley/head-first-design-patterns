<?php

namespace DesignPatterns\DecoratorPattern\Beverages;

use DesignPatterns\DecoratorPattern\Beverages\BeverageInterface;

class Decaf implements BeverageInterface
{
    public function getDescription(): string
    {
        return 'Decaf';
    }

    public function getCost(): int
    {
        return 105;
    }
}