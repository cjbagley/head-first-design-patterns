<?php

declare(strict_types=1);

namespace DesignPatterns\IteratorPattern;

readonly class MenuItem implements \Stringable
{
    public function __construct(
        private string $name,
        private string $description,
        private bool $vegetarian,
        private float $price,
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function isVegetarian(): bool
    {
        return $this->vegetarian;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function __toString(): string
    {
        return sprintf('%s (%s)', $this->name, $this->price);
    }
}
