<?php

declare(strict_types=1);

namespace DesignPatterns\CompoundPattern\Decorators;

use DesignPatterns\CompoundPattern\Ducks\Quackable;

class QuackCounter implements Quackable
{
    private static int $numberOfQuacks = 0;

    public function __construct(private readonly Quackable $duck)
    {
    }

    public function quack(): string
    {
        self::$numberOfQuacks++;
        return $this->duck->quack();
    }

    /*
     * CB Note: I usually try to avoid static methods, but I'm sticking to
     * the book example, which uses statics.
     * This is just for learning purposes anyway.
     */
    public static function getNumberOfQuacks(): int
    {
        return self::$numberOfQuacks;
    }

    public static function resetNumberOfQuacks(): void
    {
        self::$numberOfQuacks = 0;
    }
}
