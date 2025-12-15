<?php

namespace DesignPatterns\ObserverPatternPush\Displays;

use DesignPatterns\ObserverPatternPush\Data\WeatherDataDTO;

class ForecastWeatherDisplay extends WeatherDisplay
{
    private float $temperature;

    private float $humidity;


    public function update(WeatherDataDTO $data): void
    {
        $this->temperature = $data->temperature;
        $this->humidity = $data->humidity;
    }

    public function display(): string
    {
        return sprintf(
            'Forecast: Temp. %sF with %s%% humidity',
            $this->temperature,
            $this->humidity
        );
    }
}
