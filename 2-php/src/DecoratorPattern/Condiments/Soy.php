<?php

namespace DesignPatterns\DecoratorPattern\Condiments;

class Soy extends CondimentDecoratorInterface
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
