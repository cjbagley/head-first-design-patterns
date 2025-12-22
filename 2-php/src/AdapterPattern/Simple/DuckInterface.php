<?php

declare(strict_types=1);

namespace DesignPatterns\AdapterPattern\Simple;

interface DuckInterface
{
    public function quack(): string;

    public function fly(): string;
}
