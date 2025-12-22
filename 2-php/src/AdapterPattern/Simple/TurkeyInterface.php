<?php

declare(strict_types=1);

namespace DesignPatterns\AdapterPattern\Simple;

interface TurkeyInterface
{
    public function gobble(): string;

    public function fly(): string;
}
