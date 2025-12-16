<?php

namespace DesignPatterns\DecoratorPatternExpanded\Beverages;

use DesignPatterns\DecoratorPatternExpanded\Beverages\Beverage;
use DesignPatterns\DecoratorPatternExpanded\Size;

class Decaf extends Beverage
{
    #[\Override]
    public function getDescription(): string
    {
        return sprintf('Decaf - %s', $this->getSize()->value);
    }

    public function getCost(): int
    {
        return match ($this->getSize()) {
            Size::TALL => 105,
            Size::GRANDE => 115,
            Size::VENTI => 125,
        };
    }
}
