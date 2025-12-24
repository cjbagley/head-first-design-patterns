<?php

declare(strict_types=1);

namespace DesignPatterns\TemplateMethodPattern;

class Tea extends CaffeineBeverage
{
    protected function brew(): string
    {
        return 'Steeping tea bag';
    }

    protected function addCondiments(): string
    {
        return 'Adding lemon';
    }
}
