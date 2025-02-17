<?php

declare(strict_types=1);

namespace DesignPatterns\FactoryPattern\Pizza;

final class NYStyleClamPizza extends AbstractPizza
{
    public function __construct()
    {
        $this->name = 'New York Style Clam Pizza';
        $this->dough = 'Thin Crust Dough';
        $this->sauce = 'Marinara Sauce';
        $this->toppings = ['Grated Reggiano Cheese', 'Clams'];
    }
}
