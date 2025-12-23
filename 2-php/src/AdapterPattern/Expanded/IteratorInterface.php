<?php

declare(strict_types=1);

namespace DesignPatterns\AdapterPattern\Expanded;

interface IteratorInterface
{
    public function hasNext(): bool;

    public function next(): int;

    public function remove(): void;
}
