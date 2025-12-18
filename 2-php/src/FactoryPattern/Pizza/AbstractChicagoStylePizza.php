<?php

declare(strict_types=1);

namespace DesignPatterns\FactoryPattern\Pizza;

abstract class AbstractChicagoStylePizza extends AbstractPizza
{
    #[\Override]
    public function cut(): void
    {
        echo('Cutting pizza into square slices'.PHP_EOL);
    }
}
