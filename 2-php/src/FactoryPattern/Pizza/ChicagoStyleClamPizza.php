<?php

declare(strict_types=1);

namespace DesignPatterns\FactoryPattern\Pizza;

use DesignPatterns\FactoryPattern\Pizza\PizzaInterface;

final class ChicagoStyleClamPizza extends AbstractPizza
{
    public function getDescription(): string
    {
        return 'Chicago Style Clam Pizza';
    }
}
