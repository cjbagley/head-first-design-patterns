<?php

namespace DesignPatterns\SimpleFactoryPattern;

use DesignPatterns\SimpleFactoryPattern\Pizza\AbstractPizza;

class PizzaStore
{
    public function __construct(private readonly PizzaFactory $factory)
    {
    }

    public function orderPizza(string $order): AbstractPizza
    {
        return $this->factory->createPizza($order);
    }
}