<?php

declare(strict_types=1);

namespace DesignPatterns\IteratorPattern\Tests;

use DesignPatterns\IteratorPattern\DinerMenu;
use DesignPatterns\IteratorPattern\PancakeHouseMenu;
use DesignPatterns\IteratorPattern\Waitress;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class WaitressTest extends TestCase
{
    #[Test]
    public function it_prints_menu_correctly(): void
    {
        $pancakeHouseMenu = new PancakeHouseMenu();
        $dinerMenu = new DinerMenu();
        $waitress = new Waitress($pancakeHouseMenu, $dinerMenu);

        $output = $waitress->printMenu();

        // Check for Headers
        $this->assertStringContainsString("Menu\n----", $output);
        $this->assertStringContainsString("BREAKFAST", $output);
        $this->assertStringContainsString("LUNCH", $output);

        // Check PancakeHouseMenu items
        $this->assertStringContainsString("K&B's Pancake Breakfast", $output);
        $this->assertStringContainsString("Regular Pancake Breakfast", $output);
        $this->assertStringContainsString("Blueberry Pancakes", $output);
        $this->assertStringContainsString("Waffles", $output);

        // Check DinerMenu items
        $this->assertStringContainsString("Vegetarian BLT", $output);
        $this->assertStringContainsString("BLT", $output);
        $this->assertStringContainsString("Soup of the day", $output);
        $this->assertStringContainsString("Hotdog", $output);
    }

    #[Test]
    public function all_iterators_are_exhausted(): void
    {
        $pancakeHouseMenu = new PancakeHouseMenu();
        $dinerMenu = new DinerMenu();
        $waitress = new Waitress($pancakeHouseMenu, $dinerMenu);

        $output = $waitress->printMenu();

        // Test for the correct number of items by the amount of new lines.
        $lines = explode("\n", trim($output));
        $this->assertGreaterThan(8, count($lines), "The menu output should contain all items from both menus.");
    }
}
