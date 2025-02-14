<?php

namespace DesignPatterns\SimpleFactoryPattern\Pizza;

abstract class AbstractPizza implements PizzaInterface
{
    public function prepare(): void
    {
        // Prepare logic
    }

    public function bake(): void
    {
        // Bake logic
    }

    public function cut(): void
    {
        // Cut logic
    }

    public function box(): void
    {
        // Boxing logic
    }
}