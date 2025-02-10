<?php

namespace DesignPatterns\ObserverPattern\Displays;

class ForecastWeatherDisplay extends WeatherDisplay
{
    public function update(string $message): void
    {
        $data = json_decode($message);

        echo sprintf('Forecast: Temp. %sF with %s%% humidity',
            $data->temperature,
            $data->humidity
        );
    }
}