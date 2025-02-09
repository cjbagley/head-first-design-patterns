<?php

namespace DesignPatterns\ObserverPattern\Displays;

use DesignPatterns\ObserverPattern\Data\WeatherDataDTO;

class CurrentConditionWeatherDisplay extends WeatherDisplay
{
    public function getDisplayString(WeatherDataDTO $data): string
    {
        return sprintf('Current conditions: Temperature %sF, Humidity %s%%',
            $data->temperature,
            $data->humidity
        );
    }
}