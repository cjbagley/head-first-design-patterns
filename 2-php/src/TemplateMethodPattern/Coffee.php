<?php

declare(strict_types=1);

namespace DesignPatterns\TemplateMethodPattern;

class Coffee extends CaffeineBeverage
{
    protected function brew(): string
    {
        return 'Dripping Coffee through filter';
    }

    protected function addCondiments(): string
    {
        return 'Adding Sugar and Milk';
    }
}
