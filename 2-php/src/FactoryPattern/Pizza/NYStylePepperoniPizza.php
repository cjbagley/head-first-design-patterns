<?php

declare(strict_types=1);

namespace DesignPatterns\FactoryPattern\Pizza;

final class NYStylePepperoniPizza extends AbstractPizza
{
    public function __construct()
    {
        $this->name = 'New York Style Pepperoni Pizza';
        $this->dough = 'Thin Crust Dough';
        $this->sauce = 'Marinara Sauce';
        $this->toppings = ['Grated Reggiano Cheese', 'Pepperoni'];
    }
}
