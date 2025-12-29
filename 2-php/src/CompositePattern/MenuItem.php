<?php

declare(strict_types=1);

namespace DesignPatterns\CompositePattern;

use Override;

class MenuItem extends AbstractMenuComponent
{
    public function __construct(
        private readonly string $name,
        private readonly string $description,
        private readonly bool $isVegetarian,
        private readonly int $price,
    ) {
    }

    #[Override]
    public function getName(): string
    {
        return $this->name;
    }

    #[Override]
    public function getDescription(): string
    {
        return $this->description;
    }

    #[Override]
    public function isVegetarian(): bool
    {
        return $this->isVegetarian;
    }

    #[Override]
    public function getPrice(): int
    {
        return $this->price;
    }

    #[Override]
    public function __toString(): string
    {
        $string = sprintf("\t%s", $this->getName());

        if ($this->isVegetarian()) {
            $string .= ' (v)';
        }

        $string .= sprintf(', %0.2f', $this->getPrice() / 100);

        $string .= sprintf("\n\t-- %s", $this->getDescription());

        return $string;
    }
}
