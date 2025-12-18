<?php

declare(strict_types=1);

namespace DesignPatterns\DecoratorPatternExpanded\Beverages;

use DesignPatterns\DecoratorPatternExpanded\Size;

class DarkRoast extends Beverage
{
    #[\Override]
    public function getDescription(): string
    {
        return sprintf('Dark Roast - %s', $this->getSize()->value);
    }

    public function getCost(): int
    {
        return match ($this->getSize()) {
            Size::TALL => 99,
            Size::GRANDE => 109,
            Size::VENTI => 119,
        };
    }
}
