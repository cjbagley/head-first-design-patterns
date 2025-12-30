<?php

declare(strict_types=1);

namespace DesignPatterns\StatePattern\States;

interface StateInterface
{
    public function insertQuarter(): string;

    public function ejectQuarter(): string;

    public function turnCrank(): string;

    public function dispense(): string;
}
