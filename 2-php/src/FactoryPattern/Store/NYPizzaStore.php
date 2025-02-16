<?php

namespace DesignPatterns\FactoryPattern\Store;

use DesignPatterns\FactoryPattern\Pizza\AbstractPizza;
use DesignPatterns\FactoryPattern\Pizza\NYStyleClamPizza;
use DesignPatterns\FactoryPattern\Pizza\NYStyleMargaritaPizza;
use DesignPatterns\FactoryPattern\Pizza\NYStylePepperoniPizza;
use DesignPatterns\FactoryPattern\Pizza\NYStyleVeggiePizza;
use DesignPatterns\FactoryPattern\Store\AbstractPizzaStore;

class NYPizzaStore extends AbstractPizzaStore
{
    protected function createPizza(string $order): AbstractPizza
    {
        return match ($order) {
            'pepperoni' => new NYStylePepperoniPizza(),
            'veggie' => new NYStyleVeggiePizza(),
            'clam' => new NYStyleClamPizza(),
            default => new NYStyleMargaritaPizza(),
        };
    }
}
