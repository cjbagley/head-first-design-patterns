<?php

namespace DesignPatterns\ObserverPattern\Displays;

use DesignPatterns\ObserverPattern\Data\WeatherDataDTO;

class CurrentConditionWeatherDisplay extends WeatherDisplay
{
    public function update(WeatherDataDTO $data): void
    {
        echo sprintf(
            'Current conditions: Temperature %sF, Humidity %s%%',
            $data->temperature,
            $data->humidity
        );
    }
}
