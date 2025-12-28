<?php

namespace DesignPatterns\IteratorPattern;

use DesignPatterns\IteratorPattern\MenuIterator\MenuIteratorInterface;

interface MenuInterface
{
    public function createIterator(): MenuIteratorInterface;
}
