<?php

declare(strict_types=1);

namespace DesignPatterns\FactoryPattern\Store;

use DesignPatterns\FactoryPattern\Pizza\AbstractPizza;
use DesignPatterns\FactoryPattern\Pizza\ChicagoStyleClamPizza;
use DesignPatterns\FactoryPattern\Pizza\ChicagoStyleMargaritaPizza;
use DesignPatterns\FactoryPattern\Pizza\ChicagoStylePepperoniPizza;
use DesignPatterns\FactoryPattern\Pizza\ChicagoStyleVeggiePizza;

class ChicagoPizzaStore extends AbstractPizzaStore
{
    protected function createPizza(Order $order): AbstractPizza
    {
        return match ($order) {
            Order::Pepperoni => new ChicagoStylePepperoniPizza(),
            Order::Veggie => new ChicagoStyleVeggiePizza(),
            Order::Clam => new ChicagoStyleClamPizza(),
            default => new ChicagoStyleMargaritaPizza(),
        };
    }
}
