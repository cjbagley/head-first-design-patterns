<?php

declare(strict_types=1);

namespace DesignPatterns\IteratorPattern\MenuIterator;

use DesignPatterns\IteratorPattern\MenuItem;
use SplObjectStorage;

readonly class PancakeHouseMenuIterator implements MenuIteratorInterface
{
    public function __construct(
        /**
         * @var SplObjectStorage<MenuItem>
         */
        private SplObjectStorage $menuItems
    ) {
        $this->menuItems->rewind();
    }

    public function hasNext(): bool
    {
        return $this->menuItems->valid();
    }

    public function next(): MenuItem
    {
        $menuItem = $this->menuItems->current();
        $this->menuItems->next();

        return $menuItem;
    }
}
