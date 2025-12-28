<?php

declare(strict_types=1);

namespace DesignPatterns\IteratorPattern\MenuIterator;

use DesignPatterns\IteratorPattern\MenuItem;

class CafeMenuIterator implements MenuIteratorInterface
{
    private int $position = 0;

    public function __construct(
        /**
         * @var array
         */
        private readonly array $menuItems
    ) {
        if (!isset($this->menuItems['items']) || empty($this->menuItems['items'])) {
            throw new \InvalidArgumentException('The menu items must be defined.');
        }
    }

    public function hasNext(): bool
    {
        return $this->position < count($this->menuItems['items']);
    }

    public function next(): MenuItem
    {
        $menuItem = $this->menuItems['items'][$this->position];
        $this->position++;

        return $menuItem;
    }
}
