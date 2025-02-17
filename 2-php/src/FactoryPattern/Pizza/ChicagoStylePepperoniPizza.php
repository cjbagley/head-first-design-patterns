<?php

declare(strict_types=1);

namespace DesignPatterns\FactoryPattern\Pizza;

final class ChicagoStylePepperoniPizza extends AbstractChicagoStylePizza
{
    public function __construct()
    {
        $this->name = 'Chicago Style Pepperoni Pizza';
        $this->dough = 'Extra Thick Crust Dough';
        $this->sauce = 'Plum Tomato Sauce';
        $this->toppings = ['Shredded Mozzarella Cheese', 'Pepperoni'];
    }
}
