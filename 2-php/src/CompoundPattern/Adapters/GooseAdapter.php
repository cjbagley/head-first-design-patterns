<?php

declare(strict_types=1);

namespace DesignPatterns\CompoundPattern\Adapters;

use DesignPatterns\CompoundPattern\Ducks\Quackable;
use DesignPatterns\CompoundPattern\Geese\Goose;

class GooseAdapter implements Quackable
{
    public function __construct(private readonly Goose $goose)
    {
    }

    public function quack(): string
    {
        return $this->goose->honk();
    }
}
