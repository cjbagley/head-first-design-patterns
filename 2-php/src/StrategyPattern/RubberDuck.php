<?php

namespace DesignPatterns\StrategyPattern;

use DesignPatterns\StrategyPattern\Duck;

class RubberDuck extends Duck
{
    public function quack(): string
    {
       return 'squeak';
    }
}