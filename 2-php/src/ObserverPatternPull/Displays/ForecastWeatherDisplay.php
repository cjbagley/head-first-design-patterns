<?php

namespace DesignPatterns\ObserverPatternPull\Displays;

class ForecastWeatherDisplay extends WeatherDisplay
{
    private float $temperature;

    private float $humidity;


    public function update(): void
    {
        $this->temperature = $this->weatherData->getTemperature();
        $this->humidity = $this->weatherData->getHumidity();
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
