<?php

declare(strict_types=1);

namespace DesignPatterns\AdapterPattern\Simple;

class TurkeyAdaptor implements DuckInterface
{
    public function __construct(private readonly TurkeyInterface $turkey)
    {
    }

    public function quack(): string
    {
        return $this->turkey->gobble();
    }

    public function fly(): string
    {
        $burstFly = [];

        for ($i = 0; $i < 5; $i++) {
            $burstFly[] = $this->turkey->fly();
        }

        return implode(' ', $burstFly);
    }
}
