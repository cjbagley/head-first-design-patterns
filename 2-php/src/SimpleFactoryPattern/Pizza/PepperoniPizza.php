<?php

namespace DesignPatterns\SimpleFactoryPattern\Pizza;

use DesignPatterns\SimpleFactoryPattern\Pizza\PizzaInterface;

final class PepperoniPizza extends AbstractPizza
{
    public function getDescription(): string
    {
        return 'Pepperoni Pizza';
    }
}