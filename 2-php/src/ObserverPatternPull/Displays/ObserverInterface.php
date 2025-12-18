<?php

declare(strict_types=1);

namespace DesignPatterns\ObserverPatternPull\Displays;

interface ObserverInterface
{
    public function update(): void;
}
