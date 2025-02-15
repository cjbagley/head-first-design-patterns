<?php

namespace DesignPatterns\DecoratorPattern\Condiments;

class Whip extends CondimentDecoratorInterface
{
    public function getDescription(): string
    {
        return $this->beverage->getDescription().' - Whip';
    }

    public function getCost(): int
    {
        return $this->beverage->getCost() + 10;
    }
}
