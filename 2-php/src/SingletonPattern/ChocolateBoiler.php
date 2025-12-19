<?php

declare(strict_types=1);

namespace DesignPatterns\SingletonPattern;

final class ChocolateBoiler
{
    private bool $isEmpty = true;

    private bool $isBoiled = false;

    private static ?self $instance = null;

    private function __construct()
    {
    }

    public static function getInstance(): self
    {
        return self::$instance ??= new self();
    }

    public function fill(): void
    {
        if (!$this->isEmpty) {
            return;
        }

        $this->isEmpty = false;
        $this->isBoiled = false;

        // Fill the boiler with a milk/chocolate mixture...
    }

    public function drain(): void
    {
        if ($this->isEmpty) {
            return;
        }

        if (!$this->isBoiled) {
            return;
        }

        $this->isEmpty = true;

        // Drain the boiled milk/chocolate mixture...
    }

    public function boil(): void
    {
        if ($this->isEmpty) {
            return;
        }

        if ($this->isBoiled) {
            return;
        }

        $this->isBoiled = true;
        // Boil the milk/chocolate mixture...
    }

    public function isEmpty(): bool
    {
        return $this->isEmpty;
    }

    public function isBoiled(): bool
    {
        return $this->isBoiled;
    }
}
