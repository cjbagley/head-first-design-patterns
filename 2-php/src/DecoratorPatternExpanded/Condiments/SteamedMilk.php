<?php

namespace DesignPatterns\DecoratorPatternExpanded\Condiments;

use DesignPatterns\DecoratorPatternExpanded\Size;

class SteamedMilk extends CondimentDecorator
{
    #[\Override]
    public function getDescription(): string
    {
        return $this->beverage->getDescription().' - Steamed Milk';
    }

    public function getCost(): int
    {
        return match ($this->getSize()) {
            Size::TALL => $this->beverage->getCost() + 10,
            Size::GRANDE => $this->beverage->getCost() + 15,
            Size::VENTI => $this->beverage->getCost() + 20,
        };
    }
}
