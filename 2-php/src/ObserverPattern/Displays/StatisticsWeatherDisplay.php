<?php

namespace DesignPatterns\ObserverPattern\Displays;

use DesignPatterns\ObserverPattern\Data\WeatherDataDTO;

class StatisticsWeatherDisplay extends WeatherDisplay
{
    public function update(WeatherDataDTO $data): void
    {
        echo sprintf(
            'Stats: %sF | %s%% | %sP',
            $data->temperature,
            $data->humidity,
            $data->pressure,
        );
    }
}
