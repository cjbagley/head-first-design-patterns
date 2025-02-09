<?php

namespace DesignPatterns\ObserverPattern\Displays;

use DesignPatterns\ObserverPattern\Data\WeatherDataDTO;

class StatisticsWeatherDisplay extends WeatherDisplay
{
    public function getDisplayString(WeatherDataDTO $data): string
    {
        return sprintf('Stats: %sF | %s%% | %sP',
            $data->temperature,
            $data->humidity,
            $data->pressure,
        );
    }
}