<?php

declare(strict_types=1);

namespace DesignPatterns\DecoratorPattern\Condiments;

class Soy extends CondimentDecorator
{
    public function getDescription(): string
    {
        return $this->beverage->getDescription().' - Soy';
    }

    public function getCost(): int
    {
        return $this->beverage->getCost() + 15;
    }
}
