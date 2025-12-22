<?php

declare(strict_types=1);

namespace DesignPatterns\AdapterPattern\Simple;

class MallardDuck implements DuckInterface
{
    public function quack(): string
    {
        return 'Quack';
    }

    public function fly(): string
    {
        return 'I am flying';
    }
}
