<?php

declare(strict_types=1);

namespace DesignPatterns\DecoratorPattern\Beverages;

interface BeverageInterface
{
    public function getDescription(): string;

    public function getCost(): int;
}
