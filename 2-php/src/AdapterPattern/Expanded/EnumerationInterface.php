<?php

declare(strict_types=1);

namespace DesignPatterns\AdapterPattern\Expanded;

interface EnumerationInterface
{
    public function hasMoreElements(): bool;

    public function nextElement(): int;

}
