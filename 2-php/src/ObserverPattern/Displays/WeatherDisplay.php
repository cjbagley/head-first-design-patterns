<?php

namespace DesignPatterns\ObserverPattern\Displays;

use DesignPatterns\ObserverPattern\Data\WeatherDataDTO;

abstract class WeatherDisplay implements GetDisplayStringInterface
{
    public function update(WeatherDataDTO $data): void
    {
        echo $this->getDisplayString($data).PHP_EOL;
    }
}