<?php

namespace DesignPatterns\FactoryPattern\Store;

use DesignPatterns\FactoryPattern\Pizza\AbstractPizza;
use DesignPatterns\FactoryPattern\Pizza\ChicagoStyleClamPizza;
use DesignPatterns\FactoryPattern\Pizza\ChicagoStyleMargaritaPizza;
use DesignPatterns\FactoryPattern\Pizza\ChicagoStylePepperoniPizza;
use DesignPatterns\FactoryPattern\Pizza\ChicagoStyleVeggiePizza;
use DesignPatterns\FactoryPattern\Store\AbstractPizzaStore;

class ChicagoPizzaStore extends AbstractPizzaStore
{
    protected function createPizza(string $order): AbstractPizza
    {
        return match ($order) {
            'pepperoni' => new ChicagoStylePepperoniPizza(),
            'veggie' => new ChicagoStyleVeggiePizza(),
            'clam' => new ChicagoStyleClamPizza(),
            default => new ChicagoStyleMargaritaPizza(),
        };
    }
}
