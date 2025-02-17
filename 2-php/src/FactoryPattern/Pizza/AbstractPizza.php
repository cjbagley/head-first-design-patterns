<?php

declare(strict_types=1);

namespace DesignPatterns\FactoryPattern\Pizza;

abstract class AbstractPizza implements PizzaInterface
{
    protected string $name;

    protected string $dough;

    protected string $sauce;

    /**
     * @var array<string>
     */
    protected array $toppings;

    public function prepare(): void
    {
        echo('--------------------'.PHP_EOL);
        echo('Preparing pizza: '.$this->name.PHP_EOL);
        echo('Tossing dough: '.$this->dough.PHP_EOL);
        echo('Adding sauce: '.$this->sauce.PHP_EOL);
        echo('Adding toppings:'.PHP_EOL);
        foreach ($this->toppings as $topping) {
            echo(' - 	' . $topping.PHP_EOL);
        }
    }

    public function bake(): void
    {
        echo('Baking pizza in oven for 25 minutes at 350'.PHP_EOL);
    }

    public function cut(): void
    {
        echo('Cutting pizza into diagonal slices'.PHP_EOL);
    }

    public function box(): void
    {
        echo('Placing pizza in official PizzaStore box'.PHP_EOL);
    }

    public function getName(): string
    {
        return $this->name;
    }
}
