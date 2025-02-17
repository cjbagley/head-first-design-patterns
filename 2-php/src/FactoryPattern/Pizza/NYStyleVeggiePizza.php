<?php

declare(strict_types=1);

namespace DesignPatterns\FactoryPattern\Pizza;

final class NYStyleVeggiePizza extends AbstractPizza
{
    public function __construct()
    {
        $this->name = 'New York Style Veggie Pizza';
        $this->dough = 'Thin Crust Dough';
        $this->sauce = 'Marinara Sauce';
        $this->toppings = ['Grated Reggiano Cheese', 'Peppers', 'Mushrooms', 'Onions'];
    }
}
