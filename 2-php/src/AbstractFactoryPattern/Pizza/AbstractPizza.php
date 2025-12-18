<?php

declare(strict_types=1);

namespace DesignPatterns\AbstractFactoryPattern\Pizza;

use DesignPatterns\AbstractFactoryPattern\Ingredient\Cheese\AbstractCheese;
use DesignPatterns\AbstractFactoryPattern\Ingredient\Clam\AbstractClam;
use DesignPatterns\AbstractFactoryPattern\Ingredient\Dough\AbstractDough;
use DesignPatterns\AbstractFactoryPattern\Ingredient\Pepperoni\AbstractPepperoni;
use DesignPatterns\AbstractFactoryPattern\Ingredient\Sauce\AbstractSauce;
use DesignPatterns\AbstractFactoryPattern\Ingredient\Vegetable\AbstractVegetable;

abstract class AbstractPizza implements PizzaInterface
{
    protected string $name;

    protected AbstractDough $dough;

    protected AbstractSauce $sauce;

    protected AbstractCheese $cheese;

    protected ?AbstractPepperoni $pepperoni = null;

    protected ?AbstractClam $clam = null;

    /**
     * @return array<AbstractVegetable>
     */
    protected array $veggies = [];

    abstract public function prepare(): void;

    public function bake(): void
    {
        // Bake logic
    }

    public function cut(): void
    {
        // Cut logic
    }

    public function box(): void
    {
        // Box logic
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }
}
