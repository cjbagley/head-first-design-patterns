<?php

declare(strict_types=1);

namespace DesignPatterns\DecoratorPattern\Beverages;

class Decaf implements BeverageInterface
{
    public function getDescription(): string
    {
        return 'Decaf';
    }

    public function getCost(): int
    {
        return 105;
    }
}
