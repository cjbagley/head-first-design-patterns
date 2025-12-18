<?php

declare(strict_types=1);

namespace DesignPatterns\DecoratorPatternExpanded\Condiments;

use DesignPatterns\DecoratorPatternExpanded\Size;

class Mocha extends CondimentDecorator
{
    #[\Override]
    public function getDescription(): string
    {
        return $this->beverage->getDescription().' - Mocha';
    }

    public function getCost(): int
    {
        return match ($this->getSize()) {
            Size::TALL => $this->beverage->getCost() + 20,
            Size::GRANDE => $this->beverage->getCost() + 25,
            Size::VENTI => $this->beverage->getCost() + 30,
        };
    }
}
