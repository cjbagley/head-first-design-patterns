<?php

namespace DesignPatterns\FactoryPattern\Store;

use DesignPatterns\FactoryPattern\Pizza\AbstractPizza;
use DesignPatterns\FactoryPattern\Pizza\NYStyleClamPizza;
use DesignPatterns\FactoryPattern\Pizza\NYStyleMargaritaPizza;
use DesignPatterns\FactoryPattern\Pizza\NYStylePepperoniPizza;
use DesignPatterns\FactoryPattern\Pizza\NYStyleVeggiePizza;

class NYPizzaStore extends AbstractPizzaStore
{
    protected function createPizza(Order $order): AbstractPizza
    {
        return match ($order) {
            Order::Pepperoni => new NYStylePepperoniPizza(),
            Order::Veggie => new NYStyleVeggiePizza(),
            Order::Clam => new NYStyleClamPizza(),
            default => new NYStyleMargaritaPizza(),
        };
    }
}
