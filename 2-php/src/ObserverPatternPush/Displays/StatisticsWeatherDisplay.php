<?php

namespace DesignPatterns\ObserverPatternPush\Displays;

use DesignPatterns\ObserverPatternPush\Data\WeatherDataDTO;

class StatisticsWeatherDisplay extends WeatherDisplay
{
    private float $temperature;

    private float $humidity;

    private float $pressure;

    public function update(WeatherDataDTO $data): void
    {
        $this->temperature = $data->temperature;
        $this->humidity = $data->humidity;
        $this->pressure = $data->pressure;
    }

    public function display(): string
    {
        return sprintf(
            'Stats: %sF | %s%% | %sP',
            $this->temperature,
            $this->humidity,
            $this->pressure,
        );
    }
}
