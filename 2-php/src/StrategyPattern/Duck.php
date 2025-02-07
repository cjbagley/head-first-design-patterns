<?php

namespace DesignPatterns\StrategyPattern;

class Duck implements QuackableInterface
{
    public function quack(): string
    {
        return 'quack';
    }
}