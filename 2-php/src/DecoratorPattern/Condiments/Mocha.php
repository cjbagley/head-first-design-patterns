<?php

declare(strict_types=1);

namespace DesignPatterns\DecoratorPattern\Condiments;

class Mocha extends CondimentDecorator
{
    public function getDescription(): string
    {
        return $this->beverage->getDescription().' - Mocha';
    }

    public function getCost(): int
    {
        return $this->beverage->getCost() + 20;
    }
}
