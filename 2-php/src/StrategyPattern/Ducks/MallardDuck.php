<?php

declare(strict_types=1);

namespace DesignPatterns\StrategyPattern\Ducks;

class MallardDuck extends AbstractDuck
{
    public function display(): string
    {
        return 'I\'m a real mallard duck';
    }
}