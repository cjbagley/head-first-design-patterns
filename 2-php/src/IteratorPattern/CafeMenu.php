<?php

declare(strict_types=1);

namespace DesignPatterns\IteratorPattern;

use DesignPatterns\IteratorPattern\MenuIterator\CafeMenuIterator;
use DesignPatterns\IteratorPattern\MenuIterator\MenuIteratorInterface;

class CafeMenu implements MenuInterface
{
    /**
     * @var array<string, MenuItem[]|string>
     */
    private array $menuItems = [
        'items' => [],
    ];

    public function __construct()
    {
        $this->addItem('Veggie Burger and Air Fries', 'Veggie burger on a whole wheat bun, lettuce, tomato, and fries', true, 3.99);
        $this->addItem('Soup of the day', 'Soup of the day, with a side of salad', false, 3.69);
        $this->addItem('Burrito', 'A large burrito, with whole pinto beans, salsa, guacamole', true, 4.29);
    }

    public function addItem(
        string $name,
        string $description,
        bool $vegetarian,
        float $price
    ): void {
        $this->menuItems['items'][] = new MenuItem($name, $description, $vegetarian, $price);
    }

    public function createIterator(): MenuIteratorInterface
    {
        return new CafeMenuIterator($this->menuItems);
    }
}
