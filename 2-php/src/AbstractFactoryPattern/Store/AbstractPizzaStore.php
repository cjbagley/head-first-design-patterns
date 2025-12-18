<?php

declare(strict_types=1);

namespace DesignPatterns\AbstractFactoryPattern\Store;

use DesignPatterns\AbstractFactoryPattern\Pizza\AbstractPizza;

abstract class AbstractPizzaStore
{
    public function orderPizza(Order $order): AbstractPizza
    {
        $pizza = $this->createPizza($order);
        $pizza->prepare();
        $pizza->bake();
        $pizza->cut();
        $pizza->box();

        return $pizza;
    }

    abstract protected function createPizza(Order $order): AbstractPizza;
}
