<?php

declare(strict_types=1);

namespace DesignPatterns\AbstractFactoryPattern\Pizza;

use DesignPatterns\AbstractFactoryPattern\IngredientFactory\PizzaIngredientFactoryInterface;

final class CheesePizza extends AbstractPizza
{
    public function __construct(private readonly PizzaIngredientFactoryInterface $ingredientFactory)
    {
    }

    public function prepare(): void
    {
        print(sprintf('Preparing %s', $this->name) . PHP_EOL);
        $this->dough = $this->ingredientFactory->createDough();
        $this->sauce = $this->ingredientFactory->createSauce();
        $this->cheese = $this->ingredientFactory->createCheese();
    }
}
