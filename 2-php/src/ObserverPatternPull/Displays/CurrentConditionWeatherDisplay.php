<?php

declare(strict_types=1);

namespace DesignPatterns\ObserverPatternPull\Displays;

class CurrentConditionWeatherDisplay extends WeatherDisplay
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
            'Current conditions: Temperature %sF, Humidity %s%%',
            $this->temperature,
            $this->humidity
        );
    }
}
