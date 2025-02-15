<?php

namespace DesignPatterns\DecoratorPattern\Condiments;

class SteamedMilk extends CondimentDecoratorInterface
{
    public function getDescription(): string
    {
        return $this->beverage->getDescription().' - Steamed Milk';
    }

    public function getCost(): int
    {
        return $this->beverage->getCost() + 10;
    }
}
