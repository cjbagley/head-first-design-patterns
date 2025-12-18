<?php

declare(strict_types=1);

namespace DesignPatterns\AbstractFactoryPattern\IngredientFactory;

use DesignPatterns\AbstractFactoryPattern\Ingredient\Cheese\AbstractCheese;
use DesignPatterns\AbstractFactoryPattern\Ingredient\Cheese\MozarellaCheese;
use DesignPatterns\AbstractFactoryPattern\Ingredient\Clam\AbstractClam;
use DesignPatterns\AbstractFactoryPattern\Ingredient\Clam\FrozenClam;
use DesignPatterns\AbstractFactoryPattern\Ingredient\Dough\AbstractDough;
use DesignPatterns\AbstractFactoryPattern\Ingredient\Dough\ThickCrustDough;
use DesignPatterns\AbstractFactoryPattern\Ingredient\Pepperoni\AbstractPepperoni;
use DesignPatterns\AbstractFactoryPattern\Ingredient\Pepperoni\SlicedPepperoni;
use DesignPatterns\AbstractFactoryPattern\Ingredient\Sauce\AbstractSauce;
use DesignPatterns\AbstractFactoryPattern\Ingredient\Sauce\PlumTomatoSauce;
use DesignPatterns\AbstractFactoryPattern\Ingredient\Vegetable\AbstractVegetable;
use DesignPatterns\AbstractFactoryPattern\Ingredient\Vegetable\BlackOlives;
use DesignPatterns\AbstractFactoryPattern\Ingredient\Vegetable\EggPlant;
use DesignPatterns\AbstractFactoryPattern\Ingredient\Vegetable\Spinach;

class ChicagoPizzaIngredientFactory implements PizzaIngredientFactoryInterface
{
    /**
     * @return AbstractVegetable[]
     */
    public function createVeggies(): array
    {
        return [
            new Spinach(),
            new BlackOlives(),
            new EggPlant()
        ];
    }

    public function createDough(): AbstractDough
    {
        return new ThickCrustDough();
    }

    public function createSauce(): AbstractSauce
    {
        return new PlumTomatoSauce();
    }

    public function createCheese(): AbstractCheese
    {
        return new MozarellaCheese();
    }

    public function createPepperoni(): AbstractPepperoni
    {
        return new SlicedPepperoni();
    }

    public function createClam(): AbstractClam
    {
        return new FrozenClam();
    }
}
