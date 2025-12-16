<?php

namespace DesignPatterns\DecoratorPatternExpanded\Beverages;

use DesignPatterns\DecoratorPatternExpanded\Size;

abstract class Beverage implements BeverageInterface
{
    protected Size $size = Size::TALL;

    private string $description = 'Unknown Beverage';

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getSize(): Size
    {
        return $this->size;
    }

    public function setSize(Size $size): void
    {
        $this->size = $size;
    }
}
