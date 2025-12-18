<?php

declare(strict_types=1);

namespace DesignPatterns\DecoratorPatternExpanded\Beverages;

use DesignPatterns\DecoratorPatternExpanded\Size;

class HouseBlend extends Beverage
{
    #[\Override]
    public function getDescription(): string
    {
        return sprintf('House Blend - %s', $this->getSize()->value);
    }

    public function getCost(): int
    {
        return match ($this->getSize()) {
            Size::TALL => 89,
            Size::GRANDE => 99,
            Size::VENTI => 109,
        };
    }
}
