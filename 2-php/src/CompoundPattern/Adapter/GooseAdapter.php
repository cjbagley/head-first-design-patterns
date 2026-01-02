<?php

declare(strict_types=1);

namespace DesignPatterns\CompoundPattern\Adapter;

use DesignPatterns\CompoundPattern\Duck\Quackable;
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
