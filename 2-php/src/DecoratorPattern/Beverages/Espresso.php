<?php

declare(strict_types=1);

namespace DesignPatterns\DecoratorPattern\Beverages;

class Espresso implements BeverageInterface
{
    public function getDescription(): string
    {
        return 'Espresso';
    }

    public function getCost(): int
    {
        return 199;
    }
}
