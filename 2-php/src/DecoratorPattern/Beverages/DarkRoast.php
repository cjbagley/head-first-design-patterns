<?php

declare(strict_types=1);

namespace DesignPatterns\DecoratorPattern\Beverages;

class DarkRoast implements BeverageInterface
{
    public function getDescription(): string
    {
        return 'Dark Roast';
    }

    public function getCost(): int
    {
        return 99;
    }
}
