<?php

declare(strict_types=1);

namespace DesignPatterns\IteratorPattern\MenuIterator;

use DesignPatterns\IteratorPattern\MenuItem;

class DinerMenuIterator implements MenuIteratorInterface
{
    private int $position = 0;

    public function __construct(
        /**
         * @var MenuItem[]
         */
        private readonly array $menuItems
    ) {
    }

    public function hasNext(): bool
    {
        return $this->position < count($this->menuItems);
    }

    public function next(): MenuItem
    {
        $menuItem = $this->menuItems[$this->position];
        $this->position++;

        return $menuItem;
    }
}
