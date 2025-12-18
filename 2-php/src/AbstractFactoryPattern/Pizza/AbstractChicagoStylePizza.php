<?php

declare(strict_types=1);

namespace DesignPatterns\AbstractFactoryPattern\Pizza;

use DesignPatterns\AbstractFactoryPattern\Pizza\AbstractPizza;

abstract class AbstractChicagoStylePizza extends AbstractPizza
{
    #[\Override]
    public function cut(): void
    {
        echo('Cutting pizza into square slices'.PHP_EOL);
    }
}
