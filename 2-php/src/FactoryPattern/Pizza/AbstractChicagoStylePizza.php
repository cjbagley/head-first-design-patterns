<?php

namespace DesignPatterns\FactoryPattern\Pizza;

use DesignPatterns\FactoryPattern\Pizza\AbstractPizza;

abstract class AbstractChicagoStylePizza extends AbstractPizza
{
    #[\Override]
    public function cut(): void
    {
        echo('Cutting pizza into square slices'.PHP_EOL);
    }
}
