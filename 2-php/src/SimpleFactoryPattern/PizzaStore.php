<?php

declare(strict_types=1);

namespace DesignPatterns\SimpleFactoryPattern;

use DesignPatterns\SimpleFactoryPattern\Pizza\AbstractPizza;

final readonly class PizzaStore
{
    public function __construct(private PizzaFactory $factory)
    {
    }

    public function orderPizza(string $order): AbstractPizza
    {
        $pizza = $this->factory->createPizza($order);
        $pizza->prepare();
        $pizza->bake();
        $pizza->cut();
        $pizza->box();

        return $pizza;
    }
}
