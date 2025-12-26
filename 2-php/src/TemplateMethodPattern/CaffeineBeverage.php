<?php

declare(strict_types=1);

namespace DesignPatterns\TemplateMethodPattern;

abstract class CaffeineBeverage
{
    final public function prepareRecipe(): string
    {
        return implode("\n", [
            $this->boilWater(),
            $this->brew(),
            $this->pourIntoCup(),
            $this->addCondiments(),
        ]);
    }

    abstract protected function brew(): string;

    abstract protected function addCondiments(): string;

    protected function boilWater(): string
    {
        return 'Boiling water';
    }

    protected function pourIntoCup(): string
    {
        return 'Pouring into cup';
    }
}
