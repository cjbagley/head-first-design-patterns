<?php

namespace DesignPatterns\DecoratorPattern\Condiments;

use DesignPatterns\DecoratorPattern\Beverages\BeverageInterface;

abstract class CondimentDecoratorInterface implements BeverageInterface
{
    public function __construct(protected BeverageInterface $beverage)
    {
    }
}