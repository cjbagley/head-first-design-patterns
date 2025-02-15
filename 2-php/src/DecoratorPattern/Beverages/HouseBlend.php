<?php

namespace DesignPatterns\DecoratorPattern\Beverages;

use DesignPatterns\DecoratorPattern\Beverages\BeverageInterface;

class HouseBlend implements BeverageInterface
{
    public function getDescription(): string
    {
        return 'House Blend';
    }

    public function getCost(): int
    {
        return 89;
    }
}
