<?php

namespace DesignPatterns\DecoratorPatternExpanded\Condiments;

use DesignPatterns\DecoratorPatternExpanded\Size;

class Soy extends CondimentDecorator
{
    #[\Override]
    public function getDescription(): string
    {
        return $this->beverage->getDescription().' - Soy';
    }

    public function getCost(): int
    {
        return match ($this->getSize()) {
            Size::TALL => $this->beverage->getCost() + 15,
            Size::GRANDE => $this->beverage->getCost() + 20,
            Size::VENTI => $this->beverage->getCost() + 25,
        };
    }
}
