<?php

declare(strict_types=1);

namespace DesignPatterns\FactoryPattern\Pizza;

use DesignPatterns\FactoryPattern\Pizza\PizzaInterface;

final class ChicagoStylePepperoniPizza extends AbstractPizza
{
    public function getDescription(): string
    {
        return 'Chicago Style Pepperoni Pizza';
    }
}
