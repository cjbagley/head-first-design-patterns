<?php

declare(strict_types=1);

namespace DesignPatterns\IteratorPattern;

use DesignPatterns\IteratorPattern\MenuIterator\MenuIteratorInterface;

readonly class Waitress
{
    public function __construct(
        private MenuInterface $pancakeHouseMenu,
        private MenuInterface $dinerMenu,
        private MenuInterface $cafeMenu,
    ) {
    }

    public function printMenu(): string
    {
        $pancakeIterator = $this->pancakeHouseMenu->createIterator();
        $dinerIterator = $this->dinerMenu->createIterator();
        $cafeIterator = $this->cafeMenu->createIterator();

        return sprintf(
            "Menu\n----\nBREAKFAST\n%s\nLUNCH\n%s\nDINNER\n%s",
            $this->printMenuSubSection($pancakeIterator),
            $this->printMenuSubSection($dinerIterator),
            $this->printMenuSubSection($cafeIterator)
        );
    }

    private function printMenuSubSection(MenuIteratorInterface $iterator): string
    {
        $menuString = '';
        while ($iterator->hasNext()) {
            $menuItem = $iterator->next();
            $menuString .= sprintf("%s\n", $menuItem);
        }

        return $menuString;
    }
}
