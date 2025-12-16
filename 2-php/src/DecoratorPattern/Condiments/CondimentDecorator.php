<?php

namespace DesignPatterns\DecoratorPattern\Condiments;

use DesignPatterns\DecoratorPattern\Beverages\BeverageInterface;

abstract class CondimentDecorator implements BeverageInterface
{
    public function __construct(protected BeverageInterface $beverage)
    {
    }
}
