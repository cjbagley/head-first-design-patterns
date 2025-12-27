<?php

declare(strict_types=1);

namespace DesignPatterns\IteratorPattern;

use DesignPatterns\IteratorPattern\MenuIterator\MenuIteratorInterface;

readonly class Waitress
{
    public function __construct(
        private PancakeHouseMenu $pancakeHouseMenu,
        private DinerMenu $dinerMenu
    ) {
    }

    public function printMenu(): string
    {
        $pancakeIterator = $this->pancakeHouseMenu->createIterator();
        $dinerIterator = $this->dinerMenu->createIterator();

        return sprintf(
            "Menu\n----\nBREAKFAST\n%s\nLUNCH\n%s",
            $this->printMenuSubSection($pancakeIterator),
            $this->printMenuSubSection($dinerIterator)
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
