<?php

declare(strict_types=1);

namespace DesignPatterns\FactoryPattern\Pizza;

final class ChicagoStyleClamPizza extends AbstractChicagoStylePizza
{
    public function __construct()
    {
        $this->name = 'Chicago Style Clam Pizza';
        $this->dough = 'Extra Thick Crust Dough';
        $this->sauce = 'Plum Tomato Sauce';
        $this->toppings = ['Shredded Mozzarella Cheese', 'Clams'];
    }
}
