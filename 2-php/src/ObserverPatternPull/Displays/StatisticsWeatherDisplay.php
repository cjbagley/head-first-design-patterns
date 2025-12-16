<?php

namespace DesignPatterns\ObserverPatternPull\Displays;

class StatisticsWeatherDisplay extends WeatherDisplay
{
    private float $temperature;

    private float $humidity;

    private float $pressure;

    public function update(): void
    {
        $this->temperature = $this->weatherData->getTemperature();
        $this->humidity = $this->weatherData->getHumidity();
        $this->pressure = $this->weatherData->getPressure();
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
