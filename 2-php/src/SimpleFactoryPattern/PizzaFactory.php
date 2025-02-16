<?php

declare(strict_types=1);

namespace DesignPatterns\SimpleFactoryPattern;

use DesignPatterns\SimpleFactoryPattern\Pizza\AbstractPizza;
use DesignPatterns\SimpleFactoryPattern\Pizza\ClamPizza;
use DesignPatterns\SimpleFactoryPattern\Pizza\MargaritaPizza;
use DesignPatterns\SimpleFactoryPattern\Pizza\PepperoniPizza;
use DesignPatterns\SimpleFactoryPattern\Pizza\VeggiePizza;

final readonly class PizzaFactory
{
    public function createPizza(string $order): AbstractPizza
    {
        return match ($order) {
            'pepperoni' => new PepperoniPizza(),
            'veggie' => new VeggiePizza(),
            'clam' => new ClamPizza(),
            default => new MargaritaPizza(),
        };
    }
}
