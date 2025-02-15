<?php

namespace DesignPatterns\SimpleFactoryPattern\Pizza;

interface PizzaInterface
{
    public function getDescription(): string;

    public function prepare(): void;

    public function bake(): void;

    public function cut(): void;

    public function box(): void;
}
