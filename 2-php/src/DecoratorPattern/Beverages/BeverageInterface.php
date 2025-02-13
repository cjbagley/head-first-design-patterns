<?php

namespace DesignPatterns\DecoratorPattern\Beverages;

interface BeverageInterface
{
    public function getDescription(): string;

    public function getCost(): int;
}