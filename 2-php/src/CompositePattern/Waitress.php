<?php

namespace DesignPatterns\CompositePattern;

class Waitress
{
    public function __construct(private readonly AbstractMenuComponent $allMenus)
    {
    }

    public function printMenu(): string
    {
        return $this->allMenus;
    }
}
