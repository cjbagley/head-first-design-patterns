<?php

declare(strict_types=1);

namespace DesignPatterns\FactoryPattern\Pizza;

final class ChicagoStyleMargaritaPizza extends AbstractChicagoStylePizza
{
    public function __construct()
    {
        $this->name = 'Chicago Style Margarita Pizza';
        $this->dough = 'Extra Thick Crust Dough';
        $this->sauce = 'Plum Tomato Sauce';
        $this->toppings = ['Shredded Mozzarella Cheese'];
    }
}
