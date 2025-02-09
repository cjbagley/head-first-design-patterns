<?php

namespace DesignPatterns\ObserverPattern\Data;

use DesignPatterns\ObserverPattern\Displays\CurrentConditionWeatherDisplay;
use DesignPatterns\ObserverPattern\Displays\ForecastWeatherDisplay;
use DesignPatterns\ObserverPattern\Displays\StatisticsWeatherDisplay;

class WeatherData
{
    public function __construct(
        private float $temperature,
        private float $humidity,
        private float $pressure,
    ) {
        $this->measurementsChange();
    }

    public function measurementsChange(): void
    {
        $currentConditionDisplay = new CurrentConditionWeatherDisplay();
        $statisticsDisplay = new StatisticsWeatherDisplay();
        $forecastDisplay = new ForecastWeatherDisplay();
        $data = WeatherDataDTO::create($this->temperature, $this->humidity, $this->pressure);

        $currentConditionDisplay->update($data);
        $statisticsDisplay->update($data);
        $forecastDisplay->update($data);
    }

    public function getTemperature(): float
    {
        return $this->temperature;
    }

    public function setTemperature(float $temperature): void
    {
        $this->temperature = $temperature;
        $this->measurementsChange();
    }

    public function getHumidity(): float
    {
        return $this->humidity;
    }

    public function setHumidity(float $humidity): void
    {
        $this->humidity = $humidity;
        $this->measurementsChange();
    }

    public function getPressure(): float
    {
        return $this->pressure;
    }

    public function setPressure(float $pressure): void
    {
        $this->pressure = $pressure;
        $this->measurementsChange();
    }
}