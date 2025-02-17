<?php

declare(strict_types=1);

namespace DesignPatterns\FactoryPattern\Pizza;

interface PizzaInterface
{
    public function prepare(): void;

    public function bake(): void;

    public function cut(): void;

    public function box(): void;

    public function getName(): string;
}
