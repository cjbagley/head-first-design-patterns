<?php

declare(strict_types=1);

namespace DesignPatterns\DecoratorPatternExpanded\Condiments;

use DesignPatterns\DecoratorPatternExpanded\Beverages\Beverage;
use DesignPatterns\DecoratorPatternExpanded\Beverages\BeverageInterface;
use DesignPatterns\DecoratorPatternExpanded\Size;

abstract class CondimentDecorator extends Beverage
{
    public function __construct(protected BeverageInterface $beverage)
    {
    }

    #[\Override]
    public function getSize(): Size
    {
        return $this->beverage->getSize();
    }
}
