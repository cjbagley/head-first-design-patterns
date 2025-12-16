<?php

namespace DesignPatterns\ObserverPatternPull\Displays;

use DesignPatterns\ObserverPatternPull\Data\WeatherData;

abstract class WeatherDisplay implements ObserverInterface, DisplayInterface
{
    public function __construct(protected readonly WeatherData $weatherData)
    {
    }
}
