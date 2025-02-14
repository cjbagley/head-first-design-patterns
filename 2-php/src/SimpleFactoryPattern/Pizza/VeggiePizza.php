<?php

namespace DesignPatterns\SimpleFactoryPattern\Pizza;

use DesignPatterns\SimpleFactoryPattern\Pizza\PizzaInterface;

final class VeggiePizza extends AbstractPizza
{
    public function getDescription(): string
    {
        return 'Veggie Pizza';
    }
}