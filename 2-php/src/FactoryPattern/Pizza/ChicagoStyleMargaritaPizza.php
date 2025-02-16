<?php

declare(strict_types=1);

namespace DesignPatterns\FactoryPattern\Pizza;

use DesignPatterns\FactoryPattern\Pizza\PizzaInterface;

final class ChicagoStyleMargaritaPizza extends AbstractPizza
{
    public function getDescription(): string
    {
        return 'Chicago Style Margarita Pizza';
    }
}
