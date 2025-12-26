<?php

declare(strict_types=1);

namespace DesignPatterns\TemplateMethodPattern;

use Override;

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

    #[Override]
    protected function getAdditionalInformation(): string
    {
        return sprintf('Special blend for today is: %s', $this->getSpecialBlend());
    }

    private function getSpecialBlend(): string
    {
        $blends = [
            'House blend',
            'Espresso blend',
            'Breakfast blend',
            'Italian Roasts blend',
        ];

        return $blends[array_rand($blends)];
    }
}
