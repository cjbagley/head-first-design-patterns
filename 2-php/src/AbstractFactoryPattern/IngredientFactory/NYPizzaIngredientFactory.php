<?php

declare(strict_types=1);

namespace DesignPatterns\AbstractFactoryPattern\IngredientFactory;

use DesignPatterns\AbstractFactoryPattern\Ingredient\Cheese\AbstractCheese;
use DesignPatterns\AbstractFactoryPattern\Ingredient\Cheese\ReggianoCheese;
use DesignPatterns\AbstractFactoryPattern\Ingredient\Clam\AbstractClam;
use DesignPatterns\AbstractFactoryPattern\Ingredient\Clam\FreshClam;
use DesignPatterns\AbstractFactoryPattern\Ingredient\Dough\AbstractDough;
use DesignPatterns\AbstractFactoryPattern\Ingredient\Dough\ThinCrustDough;
use DesignPatterns\AbstractFactoryPattern\Ingredient\Pepperoni\AbstractPepperoni;
use DesignPatterns\AbstractFactoryPattern\Ingredient\Pepperoni\SlicedPepperoni;
use DesignPatterns\AbstractFactoryPattern\Ingredient\Sauce\AbstractSauce;
use DesignPatterns\AbstractFactoryPattern\Ingredient\Sauce\MarinaraSauce;
use DesignPatterns\AbstractFactoryPattern\Ingredient\Vegetable\AbstractVegetable;
use DesignPatterns\AbstractFactoryPattern\Ingredient\Vegetable\Garlic;
use DesignPatterns\AbstractFactoryPattern\Ingredient\Vegetable\Mushroom;
use DesignPatterns\AbstractFactoryPattern\Ingredient\Vegetable\Onion;
use DesignPatterns\AbstractFactoryPattern\Ingredient\Vegetable\RedPepper;

class NYPizzaIngredientFactory implements PizzaIngredientFactoryInterface
{
    /**
     * @return AbstractVegetable[]
     */
    public function createVeggies(): array
    {
        return [
            new Garlic(),
            new Onion(),
            new Mushroom(),
            new RedPepper(),
        ];
    }

    public function createDough(): AbstractDough
    {
        return new ThinCrustDough();
    }

    public function createSauce(): AbstractSauce
    {
        return new MarinaraSauce();
    }

    public function createCheese(): AbstractCheese
    {
        return new ReggianoCheese();
    }

    public function createPepperoni(): AbstractPepperoni
    {
        return new SlicedPepperoni();
    }

    public function createClam(): AbstractClam
    {
        return new FreshClam();
    }
}
