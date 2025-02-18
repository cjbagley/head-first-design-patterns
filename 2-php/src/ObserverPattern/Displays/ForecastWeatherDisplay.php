<?php

namespace DesignPatterns\ObserverPattern\Displays;

use DesignPatterns\ObserverPattern\Data\WeatherDataDTO;

class ForecastWeatherDisplay extends WeatherDisplay
{
    public function update(WeatherDataDTO $data): void
    {
        echo sprintf(
            'Forecast: Temp. %sF with %s%% humidity',
            $data->temperature,
            $data->humidity
        );
    }
}
