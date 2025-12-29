<?php

declare(strict_types=1);

namespace DesignPatterns\CompositePattern\Tests;

use DesignPatterns\CompositePattern\Menu;
use DesignPatterns\CompositePattern\MenuItem;
use DesignPatterns\CompositePattern\Waitress;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class WaitressTest extends TestCase
{
    #[Test]
    public function it_prints_menu_correctly(): void
    {
        // The top level menu, which holds all the other menus
        $allMenus = new Menu('ALL MENUS', 'All menus combined');

        // The individual menus
        $pancakeHouseMenu = new Menu('PANCAKE HOUSE MENU', 'Breakfast');
        $dinerMenu = new Menu('DINER MENU', 'Lunch');
        $cafeMenu = new Menu('CAFE MENU', 'Dinner');

        // Add the menus to the top level
        $allMenus->add($pancakeHouseMenu);
        $allMenus->add($dinerMenu);
        $allMenus->add($cafeMenu);

        // Individual Item
        $dinerMenu->add(new MenuItem(
            'Pasta',
            'Spaghetti with Marinara Sauce, and a slice of sourdough bread',
            true,
            389
        ));

        $cafeMenu->add(new MenuItem(
            'Veggie Burger and Air Fries',
            'Veggie burger on a whole wheat bun, lettuce, tomato, and fries',
            true,
            399
        ));

        $cafeMenu->add(new MenuItem(
            'Soup of the day',
            'Soup of the day, with a side of potato salad',
            true,
            369
        ));

        $pancakeHouseMenu->add(new MenuItem(
            "K&B's Pancake Breakfast",
            'Pancakes with scrambled eggs, and toast',
            true,
            299
        ));

        // Nested Manu
        $dessertMenu = new Menu('DESSERT MENU', 'Dessert of course!');
        $dinerMenu->add($dessertMenu);

        $dessertMenu->add(new MenuItem(
            'Apple Pie',
            'Apple pie with a flakey crust, topped with vanilla ice-cream',
            true,
            159
        ));

        $waitress = new Waitress($allMenus);
        $output = $waitress->printMenu();

        $this->assertStringContainsString('ALL MENUS, All menus combined', $output);
        $this->assertStringContainsString('PANCAKE HOUSE MENU', $output);
        $this->assertStringContainsString('DINER MENU', $output);
        $this->assertStringContainsString('Pasta', $output);
        $this->assertStringContainsString('Veggie burger', $output);
        $this->assertStringContainsString('Soup of the day', $output);
        $this->assertStringContainsString('3.89', $output);
        $this->assertStringContainsString('3.99', $output);
        $this->assertStringContainsString("K&B's Pancake Breakfast", $output);
        $this->assertStringContainsString('DESSERT MENU', $output);
        $this->assertStringContainsString('Apple Pie', $output);
        $this->assertStringContainsString('1.59', $output);
    }
}
