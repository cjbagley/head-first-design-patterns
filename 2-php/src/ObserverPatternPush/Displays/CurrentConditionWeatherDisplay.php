<?php

namespace DesignPatterns\ObserverPatternPush\Displays;

use DesignPatterns\ObserverPatternPush\Data\WeatherDataDTO;

class CurrentConditionWeatherDisplay extends WeatherDisplay
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
            'Current conditions: Temperature %sF, Humidity %s%%',
            $this->temperature,
            $this->humidity
        );
    }
}
