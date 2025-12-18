<?php

declare(strict_types=1);

namespace DesignPatterns\AbstractFactoryPattern\Store;

use DesignPatterns\AbstractFactoryPattern\IngredientFactory\NYPizzaIngredientFactory;
use DesignPatterns\AbstractFactoryPattern\Pizza\AbstractPizza;
use DesignPatterns\AbstractFactoryPattern\Pizza\CheesePizza;
use DesignPatterns\AbstractFactoryPattern\Pizza\ClamPizza;
use DesignPatterns\AbstractFactoryPattern\Pizza\PepperoniPizza;
use DesignPatterns\AbstractFactoryPattern\Pizza\VegetablePizza;

class NYPizzaStore extends AbstractPizzaStore
{
    protected function createPizza(Order $order): AbstractPizza
    {
        $ingredientFactory = new NYPizzaIngredientFactory();

        switch ($order) {
            case Order::Pepperoni:
                $pizza = new PepperoniPizza($ingredientFactory);
                $pizza->setName('New York Style Pepperoni Pizza');
                return $pizza;
            case Order::Veggie:
                $pizza = new VegetablePizza($ingredientFactory);
                $pizza->setName('New York Style Vegetable Pizza');
                return $pizza;
            case Order::Clam:
                $pizza =  new ClamPizza($ingredientFactory);
                $pizza->setName('New York Style Clam Pizza');
                return $pizza;
            default:
                $pizza = new CheesePizza($ingredientFactory);
                $pizza->setName('New York Style Cheese Pizza');
                return $pizza;
        }
    }
}
