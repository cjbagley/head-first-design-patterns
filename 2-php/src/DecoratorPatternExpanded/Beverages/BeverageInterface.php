<?php

namespace DesignPatterns\DecoratorPatternExpanded\Beverages;

use DesignPatterns\DecoratorPatternExpanded\Size;

interface BeverageInterface
{
    public function getDescription(): string;

    public function getCost(): int;

    public function setSize(Size $size): void;

    public function getSize(): Size;
}
