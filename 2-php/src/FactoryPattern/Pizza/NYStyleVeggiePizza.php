<?php

declare(strict_types=1);

namespace DesignPatterns\FactoryPattern\Pizza;

use DesignPatterns\FactoryPattern\Pizza\PizzaInterface;

final class NYStyleVeggiePizza extends AbstractPizza
{
    public function getDescription(): string
    {
        return 'New York Style Veggie Pizza';
    }
}
