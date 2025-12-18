<?php

declare(strict_types=1);

namespace DesignPatterns\AbstractFactoryPattern\Store;

use DesignPatterns\AbstractFactoryPattern\IngredientFactory\ChicagoPizzaIngredientFactory;
use DesignPatterns\AbstractFactoryPattern\Pizza\AbstractPizza;
use DesignPatterns\AbstractFactoryPattern\Pizza\CheesePizza;
use DesignPatterns\AbstractFactoryPattern\Pizza\ClamPizza;
use DesignPatterns\AbstractFactoryPattern\Pizza\PepperoniPizza;
use DesignPatterns\AbstractFactoryPattern\Pizza\VegetablePizza;

class ChicagoPizzaStore extends AbstractPizzaStore
{
    protected function createPizza(Order $order): AbstractPizza
    {
        $ingredientFactory = new ChicagoPizzaIngredientFactory();

        switch ($order) {
            case Order::Pepperoni:
                $pizza = new PepperoniPizza($ingredientFactory);
                $pizza->setName('Chicago Style Pepperoni Pizza');
                return $pizza;
            case Order::Veggie:
                $pizza = new VegetablePizza($ingredientFactory);
                $pizza->setName('Chicago Style Vegetable Pizza');
                return $pizza;
            case Order::Clam:
                $pizza =  new ClamPizza($ingredientFactory);
                $pizza->setName('Chicago Style Clam Pizza');
                return $pizza;
            default:
                $pizza = new CheesePizza($ingredientFactory);
                $pizza->setName('Chicago Style Cheese Pizza');
                return $pizza;
        }
    }
}
