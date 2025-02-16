<?php

declare(strict_types=1);

namespace DesignPatterns\FactoryPattern\Store;

use DesignPatterns\FactoryPattern\Pizza\AbstractPizza;

abstract class AbstractPizzaStore
{
    public function orderPizza(string $order): AbstractPizza
    {
        $pizza = $this->createPizza($order);
        $pizza->prepare();
        $pizza->bake();
        $pizza->cut();
        $pizza->box();

        return $pizza;
    }

    abstract protected function createPizza(string $order): AbstractPizza;
}
