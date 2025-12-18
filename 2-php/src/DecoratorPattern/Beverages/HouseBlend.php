<?php

declare(strict_types=1);

namespace DesignPatterns\DecoratorPattern\Beverages;

class HouseBlend implements BeverageInterface
{
    public function getDescription(): string
    {
        return 'House Blend';
    }

    public function getCost(): int
    {
        return 89;
    }
}
