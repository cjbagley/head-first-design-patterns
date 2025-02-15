<?php

namespace DesignPatterns\SimpleFactoryPattern\Pizza;

use DesignPatterns\SimpleFactoryPattern\Pizza\PizzaInterface;

final class MargaritaPizza extends AbstractPizza
{
    public function getDescription(): string
    {
        return 'Margarita Pizza';
    }
}
