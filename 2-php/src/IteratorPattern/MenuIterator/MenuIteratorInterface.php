<?php

declare(strict_types=1);

namespace DesignPatterns\IteratorPattern\MenuIterator;

use DesignPatterns\IteratorPattern\MenuItem;

interface MenuIteratorInterface
{
    public function hasNext(): bool;

    public function next(): MenuItem;
}
