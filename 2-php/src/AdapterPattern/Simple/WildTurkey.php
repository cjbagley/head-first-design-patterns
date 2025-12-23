<?php

declare(strict_types=1);

namespace DesignPatterns\AdapterPattern\Simple;

class WildTurkey implements TurkeyInterface
{
    public function gobble(): string
    {
        return 'Gobble gobble';
    }

    public function fly(): string
    {
        return 'flap';
    }
}
