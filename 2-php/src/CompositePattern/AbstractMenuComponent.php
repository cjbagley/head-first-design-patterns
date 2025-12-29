<?php

declare(strict_types=1);

namespace DesignPatterns\CompositePattern;

abstract class AbstractMenuComponent implements \Stringable
{
    /**
     * @throws UnsupportedOperationException
     */
    public function add(AbstractMenuComponent $menuComponent): void
    {
        throw new UnsupportedOperationException();
    }

    /**
     * @throws UnsupportedOperationException
     */
    public function remove(AbstractMenuComponent $menuComponent): void
    {
        throw new UnsupportedOperationException();
    }

    /**
     * @throws UnsupportedOperationException
     */
    public function getChild(int $index): AbstractMenuComponent
    {
        throw new UnsupportedOperationException();
    }

    /**
     * @throws UnsupportedOperationException
     */
    public function getName(): string
    {
        throw new UnsupportedOperationException();
    }

    /**
     * @throws UnsupportedOperationException
     */
    public function getDescription(): string
    {
        throw new UnsupportedOperationException();
    }

    /**
     * @throws UnsupportedOperationException
     */
    public function getPrice(): int
    {
        throw new UnsupportedOperationException();
    }

    /**
     * @throws UnsupportedOperationException
     */
    public function isVegetarian(): bool
    {
        throw new UnsupportedOperationException();
    }

    abstract public function __toString(): string;
}
