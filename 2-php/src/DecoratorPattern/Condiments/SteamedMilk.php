<?php

declare(strict_types=1);

namespace DesignPatterns\DecoratorPattern\Condiments;

class SteamedMilk extends CondimentDecorator
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
