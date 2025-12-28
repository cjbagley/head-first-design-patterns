<?php

declare(strict_types=1);

namespace DesignPatterns\IteratorPattern;

use DesignPatterns\IteratorPattern\MenuIterator\DinerMenuIterator;
use DesignPatterns\IteratorPattern\MenuIterator\MenuIteratorInterface;
use Exception;

class DinerMenu implements MenuInterface
{
    private const int MAX_ITEMS = 6;

    private int $numberOfItems = 0;

    /**
     * @var MenuItem[]
     */
    private array $menuItems = [];

    /**
     * @throws Exception
     */
    public function __construct()
    {
        $this->addItem('Vegetarian BLT', "(Fakin') Bacon with lettuce & tomato", true, 2.99);
        $this->addItem('BLT', 'Bacon with lettuce & tomato', false, 2.99);
        $this->addItem('Soup of the day', 'Soup of the day, with a side of potato salad', false, 3.29);
        $this->addItem('Hotdog', 'A hot dog, with sauerkraut, relish, onions, topped with cheese', false, 3.05);
    }

    /**
     * @throws Exception
     */
    public function addItem(
        string $name,
        string $description,
        bool $vegetarian,
        float $price
    ): void {
        if ($this->numberOfItems >= self::MAX_ITEMS) {
            throw new \Exception('Sorry, menu is full! Can not add item.');
        }

        $menuItem = new MenuItem($name, $description, $vegetarian, $price);
        $this->menuItems[] = $menuItem;
        $this->numberOfItems++;
    }

    public function createIterator(): MenuIteratorInterface
    {
        return new DinerMenuIterator($this->menuItems);
    }
}
