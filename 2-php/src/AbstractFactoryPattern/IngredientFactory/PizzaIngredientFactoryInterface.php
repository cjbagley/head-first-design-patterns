<?php

declare(strict_types=1);

namespace DesignPatterns\AbstractFactoryPattern\IngredientFactory;

use DesignPatterns\AbstractFactoryPattern\Ingredient\Cheese\AbstractCheese;
use DesignPatterns\AbstractFactoryPattern\Ingredient\Clam\AbstractClam;
use DesignPatterns\AbstractFactoryPattern\Ingredient\Dough\AbstractDough;
use DesignPatterns\AbstractFactoryPattern\Ingredient\Pepperoni\AbstractPepperoni;
use DesignPatterns\AbstractFactoryPattern\Ingredient\Sauce\AbstractSauce;
use DesignPatterns\AbstractFactoryPattern\Ingredient\Vegetable\AbstractVegetable;

interface PizzaIngredientFactoryInterface
{
    /**
     * @return AbstractVegetable[]
     */
    public function createVeggies(): array;

    public function createDough(): AbstractDough;

    public function createSauce(): AbstractSauce;

    public function createCheese(): AbstractCheese;

    public function createPepperoni(): AbstractPepperoni;

    public function createClam(): AbstractClam;
}
