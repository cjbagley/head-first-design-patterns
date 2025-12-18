<?php

declare(strict_types=1);

namespace DesignPatterns\DecoratorPatternExpanded\Beverages;

use DesignPatterns\DecoratorPatternExpanded\Size;

class Espresso extends Beverage
{
    #[\Override]
    public function getDescription(): string
    {
        return sprintf('Espresso - %s', $this->getSize()->value);
    }

    public function getCost(): int
    {
        return match ($this->getSize()) {
            Size::TALL => 199,
            Size::GRANDE => 209,
            Size::VENTI => 219,
        };
    }
}
